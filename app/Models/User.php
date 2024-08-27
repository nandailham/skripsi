<?php

namespace App\Models;

use App\Traits\UUID;

use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama',
        'email',
        'username',
        'password',
        'role',
        'jenis_kelamin',
        'nomor_telepon',
        'alamat',
        'poliklinik_id',
    ];

    protected $role = ['admin','guru', 'kepala_sekolah'];

    protected $dates = ['deleted_at'];
    // protected static $soft_cascade = ['customer'];

    protected $primaryKey = 'id_user';

    public function getIdAttribute()
    {
        return $this->id_user;
    }


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'id' => 'string'
    ];






}




