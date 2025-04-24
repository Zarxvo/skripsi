<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Alternatif;
use Illuminate\Http\Request;
use App\Models\SkorAlternatif;

class OptimasiController extends Controller
{
    public function index()
    {
        $alternatif = Alternatif::all();
        $kriteria = Kriteria::all();
        $skors = SkorAlternatif::with('subkriteria')->get();

        $pembagi = [];
        foreach ($kriteria as $k) {
            $nilai_kriteria = SkorAlternatif::where('kriteria_id', $k->id)
                ->with('subkriteria')->get()
                ->map(fn($skor) => $skor->subkriteria->nilai);

            $pembagi[$k->id] = sqrt($nilai_kriteria->sum(fn($nilai) => pow($nilai, 2)));
        }

        $optimasi = [];
        foreach ($alternatif as $a) {
            $benefit = 0;
            $cost = 0;

            foreach ($kriteria as $k) {
                $skor = SkorAlternatif::where('alternatif_id', $a->id)
                    ->where('kriteria_id', $k->id)
                    ->with('subkriteria')->first();

                if ($skor && $pembagi[$k->id] != 0) {
                    $nilai_normal = $skor->subkriteria->nilai / $pembagi[$k->id];
                    $bobot = $k->bobot;

                    if ($k->tipe == 'benefit') {
                        $benefit += $nilai_normal * $bobot;
                    } else {
                        $cost += $nilai_normal * $bobot;
                    }
                }
            }

            $optimasi[$a->id] = $benefit - $cost;
        }

        return view('moora.optimasi', compact('alternatif', 'optimasi'));
    }
}

