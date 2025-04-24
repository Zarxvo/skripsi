<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Alternatif;
use App\Models\SubKriteria;
use Illuminate\Http\Request;
use App\Models\SkorAlternatif;

class AlternatifController extends Controller
{
    public function index()
    {
        $skor = SkorAlternatif::select(
            'skoralternatif.id as id',
            'alternatif.id as id_al',
            'kriteria.id as id_kri',
            'subkriteria.id as id_sub',
            'alternatif.nama as nama',
            'kriteria.kode as kriteria',
            'subkriteria.nilai as nilai',
            'subkriteria.deskripsi as deskripsi')
        ->leftJoin('alternatif', 'alternatif.id', '=', 'skoralternatif.alternatif_id')
        ->leftJoin('kriteria', 'kriteria.id', '=', 'skoralternatif.kriteria_id')
        ->leftJoin('subkriteria', 'subkriteria.id', '=', 'skoralternatif.subkriteria_id')
        ->get();

        $alternatif = Alternatif::get();

        $kriteria = Kriteria::get();
        return view('alternatif.index', compact('skor', 'alternatif', 'kriteria'))->with('i', 0);
    }

    public function create()
    {
        $kriteria = Kriteria::get();
        $subkriteria = SubKriteria::get();
        return view('alternatif.create', compact('kriteria', 'subkriteria'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required'
        ]);

        // Menyimpan alternatif
        $alt = new Alternatif;
        $alt->nama = $request->nama;
        $alt->save();

        // Menyimpan skor
        $kriteria = Kriteria::get();
        foreach ($kriteria as $k) {
            $skor = new SkorAlternatif();
            $skor->alternatif_id = $alt->id;
            $skor->kriteria_id = $k->id;
            $skor->subkriteria_id = $request->input('kriteria')[$k->id];
            $skor->save();
        }

        return redirect()->route('alternatif.index')
            ->with('success', 'Alternatif berhasil ditambahkan.');
    }
    public function edit(Alternatif $alternatif)
    {
        $kriteria = Kriteria::get();
        $subkriteria = SubKriteria::get();
        $skoralternatif = SkorAlternatif::where('alternatif_id', $alternatif->id)->get();
        return view('alternatif.edit', compact('alternatif', 'skoralternatif', 'kriteria', 'subkriteria'));
    }
    public function update(Request $request, Alternatif $alternatif)
    {
        // Menyimpan Skor
        $skor = SkorAlternatif::where('alternatif_id', $alternatif->id)->get();
        $kriteria = Kriteria::get();
        foreach ($kriteria as $key => $cw) {
            $skor[$key]->subkriteria_id = $request->input('kriteria')[$cw->id];
            $skor[$key]->save();
        }

        return redirect()->route('alternatif.index')
            ->with('success', 'Alternatif berhasil diperbarui');
    }
     public function destroy(Alternatif $alternatif)
    {
        $scok = Skoralternatif::where('alternatif_id', $alternatif->id)->delete();
        $alternatif->delete();

        return redirect()->route('alternatif.index')
            ->with('success', 'Alternatif berhasil dihapus');
    }
}
