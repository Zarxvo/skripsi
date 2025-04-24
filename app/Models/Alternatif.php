<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Alternatif extends Model
{
    use HasFactory;
    protected $table = 'alternatif';

    protected $fillable = [
        'nama'
    ];
    public function skors()
    {
        return $this->hasMany(SkorAlternatif::class, 'alternatif_id');
    }

}
