<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    public function index()
    {
        $kriteria = Kriteria::orderBy('prioritas', 'asc')->get();
        return view('kriteria.index', compact('kriteria'));
    }

    public function create()
    {
        return view('kriteria.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|unique:kriteria|max:10',
            'tipe' => 'required|in:benefit,cost',
            'prioritas' => 'required|integer|min:1',
            'deskripsi' => 'nullable|string'
        ]);

        Kriteria::create($request->all());
        
        // Hitung ulang bobot ROC
        // Kriteria::hitungBobotROC();

        return redirect()->route('kriteria.index')
            ->with('success', 'Kriteria berhasil ditambahkan');
    }

    public function edit(Kriteria $kriterium)
    {
        return view('kriteria.edit', compact('kriterium'));
    }

    public function update(Request $request, Kriteria $kriterium)
    {
        $request->validate([
            'kode' => 'required|max:10|unique:kriteria,kode,'.$kriterium->id,
            'tipe' => 'required|in:benefit,cost',
            'prioritas' => 'required|integer|min:1',
            'deskripsi' => 'nullable|string'
        ]);

        $kriterium->update($request->all());
        
        // Hitung ulang bobot ROC
        // Kriteria::hitungBobotROC();

        return redirect()->route('kriteria.index')
            ->with('success', 'Kriteria berhasil diperbarui');
    }

    public function destroy(Kriteria $kriterium)
    {
        $kriterium->delete();
        
        // Hitung ulang bobot ROC
        // Kriteria::generateBobotROC();

        return redirect()->route('kriteria.index')
            ->with('success', 'Kriteria berhasil dihapus');
    }

    public function generateBobot()
    {
        if (Kriteria::generateBobotROC()) {
            return redirect()->route('kriteria.index')->with('success', 'Bobot berhasil dihitung dengan metode ROC.');
        } else {
            return redirect()->route('kriteria.index')->with('error', 'Tidak ada kriteria untuk dihitung.');
        }
    }
}
