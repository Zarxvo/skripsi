<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Alternatif;
use Illuminate\Http\Request;
use App\Models\SkorAlternatif;

class NormalisasiController extends Controller
{
    public function index()
    {
        $alternatif = Alternatif::all();
        $kriteria = Kriteria::all();
        $skors = SkorAlternatif::with('subkriteria')->get();

        // hitung nilai kuadrat untuk tiap kriteria
            $normalisasi = [];
            foreach ($kriteria as $k) {
                $nilai_kriteria = SkorAlternatif::where('kriteria_id', $k->id)
                    ->with('subkriteria')->get()
                    ->map(fn($skor) => $skor->subkriteria->nilai);

                $penyebut = sqrt($nilai_kriteria->sum(fn($nilai) => pow($nilai, 2)));

                foreach ($alternatif as $a) {
                    $skor = SkorAlternatif::where('alternatif_id', $a->id)
                        ->where('kriteria_id', $k->id)
                        ->with('subkriteria')->first();

                    if ($skor && $penyebut != 0) {
                        $normalisasi[$a->id][$k->id] = $skor->subkriteria->nilai / $penyebut;
                }
            }
        }

        return view('moora.normalisasi', compact('alternatif', 'kriteria', 'normalisasi'));
    }
}
