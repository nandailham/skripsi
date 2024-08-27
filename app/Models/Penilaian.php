<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;

    protected $table = 'penilaian';
    protected $guarded = [];

    protected $primaryKey = 'id_penilaian';
    
    public function getIdAttribute()
    {
        return $this->id_penilaian;
    }

    function user(){
		return $this->belongsTo(User::class, 'id_user', 'id_user');
	}


}
