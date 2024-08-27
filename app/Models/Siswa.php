<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswa';
    protected $guarded = [];

    protected $primaryKey = 'id_siswa';
    
    public function getIdAttribute()
    {
        return $this->id_siswa;
    }
    public function getJenisKelaminAttribute()
    {
        return $this->attributes['jenis_kelamin'] == 'L' ? 'Laki-laki' : 'Perempuan';
    }
}
