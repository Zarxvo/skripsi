<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Helpers\Helper;
use App\Models\Kriteria;
use App\Models\Penilaian;
use App\Models\Alternatif;
use Illuminate\Http\Request;
use App\Models\SkorAlternatif;

class MooraController extends Controller
{
    public function index()
    {
        $skors = SkorAlternatif::with(['alternatif', 'kriteria', 'subkriteria'])->get();

        $alternatif = Alternatif::get();

        $kriteria = Kriteria::get();

        $matrikskeputusan = [];

        foreach ($skors as $skor) {
            $matrikskeputusan[$skor->alternatif_id][$skor->kriteria_id] = $skor->subkriteria->nilai;
        }

        return view('moora.matriks', compact( 'alternatif', 'kriteria', 'matrikskeputusan'))->with('i', 0);
    }

    // public function normalisasi()
    // {
    //     $pembagi = [];
    //     foreach ($kriteria as $k) {
    //         $sumSquares = 0;
    //         foreach ($alternatif as $a) {
    //             $sumSquares += pow($matriksKeputusan[$a->id][$k->id] ?? 0, 2);
    //         }
    //         $pembagi[$k->id] = sqrt($sumSquares);
    //     }

    //     $normalisasi = [];
    //     foreach ($alternatifs as $a) {
    //         foreach ($kriterias as $k) {
    //             $normalisasi[$a->id][$k->id] = 
    //                 ($matriksKeputusan[$a->id][$k->id] ?? 0) / ($pembagi[$kriteria->id] ?: 1);
    //         }
    //     }
    //     return view('moora.normalisasi', compact( 'alternatif', 'kriteria', 'normalisasi'));
    // }

}

