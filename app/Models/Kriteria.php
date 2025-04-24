<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kriteria extends Model
{
    use HasFactory;

    protected $table = 'kriteria';

    protected $fillable = ['kode', 'tipe', 'bobot','prioritas', 'deskripsi'];

    public function subkriteria()
    {
        return $this->hasMany(Subkriteria::class, 'kriteria_id');
    }

    public function skorAlternatif()
    {
        return $this->hasMany(SkorAlternatif::class, 'kriteria_id');
    }

    public static function generateBobotROC()
    {
        $kriteria = self::orderBy('prioritas')->get(); // Urutkan berdasarkan prioritas
        $jumlah = $kriteria->count();

        if ($jumlah == 0) {
            return false;
        }

        $bobotROC = [];
        foreach ($kriteria as $index => $k) {
            $rank = $index + 1;
            $bobot = 0;
            for ($i = $rank; $i <= $jumlah; $i++) {
                $bobot += 1 / $i;
            }
            $bobotROC[$k->id] = $bobot / $jumlah;
        }

        foreach ($bobotROC as $id => $bobot) {
            self::where('id', $id)->update(['bobot' => $bobot]);
        }

        return true;
    }
}
