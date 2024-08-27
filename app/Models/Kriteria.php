<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;

    protected $table = 'kriteria';
    protected $guarded = [];
  
    protected $primaryKey = 'kode_kriteria';
    protected $keyType = 'string';

    public $incrementing = false;

    public function parameter()
    {
        return $this->hasMany(Parameter::class, 'kode_kriteria', 'kode_kriteria');
    }


}
