<?php

namespace App\Exports;

use App\Models\Alternatif;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MooraExport implements FromCollection, WithHeadings
{
    protected $ranking;

    public function __construct($ranking)
    {
        $this->ranking = $ranking;
    }

    public function collection()
    {
        return collect($this->ranking)->map(function ($item, $index) {
            return [
                'Peringkat' => $index + 1,
                'Alternatif' => $item['alternatif'],
                'Benefit' => round($item['benefit'], 4),
                'Cost' => round($item['cost'], 4),
                'skor' => round($item['skor'], 4),
            ];
        });
    }

    public function headings(): array
    {
        return ['Peringkat', 'Alternatif', 'Benefit', 'Cost', 'Skor'];
    }
}