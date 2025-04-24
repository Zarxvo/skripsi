<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SkorAlternatif extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'skoralternatif';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */


    protected $fillable = ['alternatif_id', 'kriteria_id', 'subkriteria_id', 'nilai'];

    public function alternatif()
    {
        return $this->belongsTo(Alternatif::class);
    }

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }

    public function subkriteria()
    {
        return $this->belongsTo(Subkriteria::class);
    }
}
