<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Siswa;
use App\Models\Dokter;
use App\Models\Jadwal;
use App\Models\Pasien;
use App\Models\Antrian;
use App\Models\Pegawai;
use App\Models\Kriteria;
use App\Models\Permission;
use App\Models\Poliklinik;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
  public function index()
  {
    // if (Auth::user()->role == 'admin') {
      $data = [
        'siswa' => Siswa::count(),
        'kriteria' => Kriteria::count(),
      ];
    // }


    // if (Auth::user()->role == 'pegawai') {

    //   $poli = $this->getPoliklinik();
    //   $data = [
    //     'poli' => $poli,
    //     'data_jadwal' => Jadwal::where('poliklinik_id', $poli->id)->get(),
    //     'antrian' => Antrian::whereHas('jadwal', function ($query) use ($poli) {
    //                     $query->where('poliklinik_id', $poli->id);
    //                   })->whereDate('tanggal_reservasi', Carbon::today())->count()
    //     // 'p_poliklinik' => $poli_,
    //   ];
    // }

    return view('admin.dashboard', $data);
  }
}
