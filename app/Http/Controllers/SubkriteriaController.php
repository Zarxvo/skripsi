<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\SubKriteria;
use Illuminate\Http\Request;

class SubkriteriaController extends Controller
{

    public function index()
    {
        $kriteria = Kriteria::with('subkriteria')->get();
        return view('subkriteria.index', compact('kriteria'));
    }

    public function create()
    {
        $kriteria = Kriteria::all();
        return view('subkriteria.create', compact('kriteria'));
    }

   public function store(Request $request)
    {
        $request->validate([
            'kriteria_id' => 'required|exists:kriteria,id',
            'deskripsi' => 'required|string|max:255',
            'nilai' => 'required|numeric',
        ]);

        Subkriteria::create($request->only('kriteria_id', 'deskripsi', 'nilai'));

        return redirect()->route('subkriteria.index')->with('success', 'Subkriteria berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $subkriteria = Subkriteria::findOrFail($id);
        $kriteria = Kriteria::all();
        return view('subkriteria.edit', compact('subkriteria', 'kriteria'));
    }

public function update(Request $request, $id)
{
    $request->validate([
        'kriteria_id' => 'required|exists:kriteria,id',
        'deskripsi' => 'required|string|max:255',
        'nilai' => 'required|numeric|min:0',
    ]);

    $subkriteria = Subkriteria::findOrFail($id);
    $subkriteria->update([
        'kriteria_id' => $request->kriteria_id,
        'deskripsi' => $request->deskripsi,
        'nilai' => $request->nilai,
    ]);

    return redirect()->route('subkriteria.index')->with('success', 'Subkriteria berhasil diperbarui.');
}
    public function destroy(Subkriteria $subkriterium)
    {
        $subkriterium->delete();
        return redirect()->route('subkriteria.index')->with('success', 'Subkriteria berhasil dihapus.');
    }
}
