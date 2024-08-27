<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parameter extends Model
{
    protected $table = 'parameter';
    protected $guarded = [];


    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class, 'kode_kriteria', 'kode_kriteria');
    }
    
    public static function getBobot($kode_kriteria, $nilai)
    {
        $parameters = self::where('kode_kriteria', $kode_kriteria)->get();

        foreach ($parameters as $parameter) {
            if (self::nilaiInRange($parameter->nilai_v, $nilai)) {
                return $parameter->bobot;
            }
        }

        return 0; // atau nilai default jika tidak ada yang sesuai
    }

    private static function nilaiInRange($nilai_v, $nilai)
    {
        if (preg_match('/<=/', $nilai_v)) {
            return $nilai <= (int) filter_var($nilai_v, FILTER_SANITIZE_NUMBER_INT);
        } elseif (preg_match('/>=/', $nilai_v)) {
            return $nilai >= (int) filter_var($nilai_v, FILTER_SANITIZE_NUMBER_INT);
        } else {
            list($min, $max) = explode('-', $nilai_v);
            return $nilai >= (int) $min && $nilai <= (int) $max;
        }
    }
}
