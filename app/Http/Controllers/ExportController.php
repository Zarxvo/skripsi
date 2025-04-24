<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alternatif;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\MooraExport;
use PDF;

class ExportController extends Controller
{
    public function exportPdf(Request $request)
    {
        $limit = $request->input('limit', 10);

        $data = Alternatif::with('skors')
            ->get()
            ->map(function ($item) {
                return [
                    'alternatif' => $item->nama,
                    'benefit' => $item->benefit,
                    'cost' => $item->cost,
                    'skor' => $item->skor,
                    'peringkat' => $item->ranking,
                ];
            })->sortByDesc('skor')->take($limit);

        $pdf = PDF::loadView('moora.export_pdf', ['data' => $data]);
        return $pdf->download('moora-peringkat.pdf');
    }

    public function exportExcel()
    {
        return Excel::download(new MooraExport, 'moora-peringkat.xlsx');
    }
}
