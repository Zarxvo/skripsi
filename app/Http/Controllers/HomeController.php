<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Alternatif;
use App\Models\SubKriteria;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
    $jumlahAlternatif = Alternatif::count();
    $jumlahKriteria = Kriteria::count();
    $jumlahSubKriteria = SubKriteria::Count();

    return view('home', compact('jumlahAlternatif', 'jumlahKriteria', 'jumlahSubKriteria'));
    }
}
