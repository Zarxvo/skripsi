<?php

namespace App\Models;

use App\Models\SubKriteria;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubKriteria extends Model
{
    use HasFactory;
    protected $table = 'subkriteria';
    protected $fillable = [
        'kriteria_id',
        'deskripsi',
        'nilai',
    ];

    //  public static function data_sub_kriteria($kriteria_id)
    // {
    //     return self::where('kriteria_id', $kriteria_id)->get();
    // }
    
    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class, 'kriteria_id');
    }
}
