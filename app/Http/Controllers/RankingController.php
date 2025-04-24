<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Alternatif;
use Illuminate\Http\Request;
use App\Models\SkorAlternatif;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\MooraExport;
use Maatwebsite\Excel\Facades\Excel;

class RankingController extends Controller
{
    public function index()
    {
        $alternatifs = Alternatif::with('skors.subkriteria', 'skors.kriteria')->get();
        $kriterias = Kriteria::all();

        $normalisasi = [];
        $pembagi = [];

        foreach ($kriterias as $kriteria) {
            $totalKuadrat = 0;
            foreach ($alternatifs as $alt) {
                $skor = SkorAlternatif::where('kriteria_id', $kriteria->id)->first();
                if ($skor) {
                    $nilai = $skor->subkriteria->nilai ?? 0;
                    $totalKuadrat += pow($nilai, 2);
                }
            }
            $pembagi[$kriteria->id] = sqrt($totalKuadrat);
        }

        $hasil = [];
        foreach ($alternatifs as $alt) {
            $benefit = 0;
            $cost = 0;
            foreach ($kriterias as $kriteria) {
                $skor = SkorAlternatif::where('alternatif_id', $alt->id)
                    ->where('kriteria_id', $kriteria->id)
                    ->with('subkriteria')->first();
                $nilai = $skor->subkriteria->nilai ?? 0;
                $pembagiNilai = $pembagi[$kriteria->id] ?: 1;
                $normal = $nilai / $pembagiNilai;

                $bobot = $kriteria->bobot;
                $prioritas = $kriteria->prioritas ?? 1;

                if ($kriteria->tipe === 'benefit') {
                    $benefit += $normal * $bobot;
                } else {
                    $cost += $normal * $bobot;
                }

                $normalisasi[$alt->id][$kriteria->id] = $normal;
            }

            $hasil[] = [
                'alternatif' => $alt->nama,
                'benefit' => $benefit,
                'cost' => $cost,
                'skor_akhir' => $benefit - $cost,
                'prioritas_benefit' => $kriterias->where('tipe', 'benefit')->sum('prioritas'),
            ];
        }

        $ranking = collect($hasil)->sort(function ($a, $b) {
            if ($b['skor_akhir'] == $a['skor_akhir']) {
                return $b['prioritas_benefit'] <=> $a['prioritas_benefit'];
            }
            return $b['skor_akhir'] <=> $a['skor_akhir'];
        })->values();

        $ranked = [];
        $currentRank = 1;
        $previousSkor = null;
        foreach ($ranking as $index => $item) {
            if ($previousSkor !== null && $item['skor_akhir'] < $previousSkor) {
                $currentRank = $index + 1;
            }
            $item['ranking'] = $currentRank;
            $ranked[] = $item;
            $previousSkor = $item['skor_akhir'];
        }
        return view('moora.ranking', compact('ranked'));
    }

    public function exportPdf(Request $request)
    {
        $jumlahData = $request->input('limit', null); // default-nya semua kalau tidak ada input

        // Ambil data dari index()
        $data = $this->index()->getData();

        $ranking = collect($data['ranked']);

        if ($jumlahData) {
            $ranking = $ranking->take($jumlahData);
        }

        // Kirim ke view PDF
        $pdf = Pdf::loadView('moora.export_pdf', [
            'ranked' => $ranking
        ]);

        return $pdf->download('perhitungan_moora.pdf');
    }

    public function exportExcel(Request $request)
    {
        $jumlahData = $request->input('limit', null);

        $data = $this->index()->getData(true); // Ambil hasil dari index (as array)
        $ranking = collect($data['ranking']);

        if ($jumlahData) {
            $ranking = $ranking->take($jumlahData);
        }

        return Excel::download(new MooraExport($ranking), 'perhitungan_moora.xlsx');
    }
}
