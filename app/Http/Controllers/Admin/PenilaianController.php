<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Siswa;
use App\Models\Kriteria;
use App\Models\Penilaian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PenilaianController extends Controller
{
    public function index()
    {
        // Ambil semua siswa
        $siswa = Siswa::all();
    
        // Ambil semua kriteria
        $kriteria = Kriteria::all();
    
        // Ambil penilaian
        $penilaian = Penilaian::all();
    
        // Inisialisasi matriks keputusan
        $matriksKeputusan = [];
    
        foreach ($siswa as $s) {
            $matriksKeputusan[$s->id_siswa]['nama'] = $s->nama;
            $matriksKeputusan[$s->id_siswa]['id_siswa'] = $s->id_siswa;
            
            // Penilai default
            $penilai = null;
    
            foreach ($kriteria as $k) {
                $nilai = $penilaian->where('id_siswa', $s->id_siswa)
                    ->where('kode_kriteria', $k->kode_kriteria)
                    ->first();
                if ($nilai) {
                    $matriksKeputusan[$s->id_siswa][$k->kode_kriteria] = $nilai->nilai;
                    
                    // Set penilai jika belum diset
                    if ($penilai === null) {
                        $penilai = $nilai->user->nama ?? null;
                    }
                    
                    $matriksKeputusan[$s->id_siswa]['penilai'] = $penilai;
                } else {
                    $matriksKeputusan[$s->id_siswa]['penilai'] = $penilai;
                    $matriksKeputusan[$s->id_siswa][$k->kode_kriteria] = 0;
                }
            }
        }
    
        $data = [
            'matriksKeputusan' => $matriksKeputusan,
            'kriteria' => $kriteria
        ];
    
        return view('admin.penilaian.index', $data);
    }
    
}
