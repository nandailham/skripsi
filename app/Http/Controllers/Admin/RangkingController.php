<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kriteria;
use App\Models\Parameter;
use App\Models\Penilaian;
use App\Http\Controllers\Controller;
use App\Models\Configurasi;
use App\Models\Siswa;
use PDF;


class RangkingController extends Controller
{
    public function getRangkingData()
    {

        $_kriteria = Kriteria::all();
        $config = Configurasi::first();

        if($_kriteria->count() != $config->kriteria) return view('admin.rangking.error');

        $jmlhpar = [];

        foreach ($_kriteria as $kriteria) {
            $kriteria_id = $kriteria->kode_kriteria;
            $jumlahParam = Parameter::where('kode_kriteria', $kriteria_id)->count();
            $jmlhpar[$kriteria_id] = $jumlahParam;
        
            if ($jumlahParam != $config->parameter) {
                return view('admin.rangking.error');
            }
        }


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
            foreach ($kriteria as $k) {
                $nilai = $penilaian->where('id_siswa', $s->id_siswa)
                    ->where('kode_kriteria', $k->kode_kriteria)
                    ->first();

                if ($nilai) {
                    $bobot = Parameter::getBobot($k->kode_kriteria, $nilai->nilai);
                    $matriksKeputusan[$s->id_siswa][$k->kode_kriteria] = $bobot;
                } else {
                    $matriksKeputusan[$s->id_siswa][$k->kode_kriteria] = 0;
                }
            }
        }

        // Panggil function normalisasi
        $matriksNormalisasi = $this->normalisasiMatriksKeputusan($matriksKeputusan, $kriteria);

        // Ambil bobot kriteria
        $bobotKriteria = $this->getBobotKriteria($kriteria);

        // Hitung nilai akhir
        $hasilPerhitungan = $this->hitungNilaiAkhir($matriksNormalisasi, $bobotKriteria);

        // Urutkan berdasarkan nilai akhir
        usort($hasilPerhitungan, function ($a, $b) {
            return $b['nilai'] <=> $a['nilai']; // Urutkan dari yang terbesar
        });

        $data = [
            'matriksKeputusan' => $matriksKeputusan,
            'matriksNormalisasi' => $matriksNormalisasi,
            'hasilPerhitungan' => $hasilPerhitungan,
            'kriteria' => $kriteria
        ];

        return view('admin.rangking.index', $data);
    }

    private function normalisasiMatriksKeputusan($matriksKeputusan, $kriteria)
    {
        $matriksNormalisasi = [];

        foreach ($kriteria as $k) {
            $values = array_column(array_map(function ($item) use ($k) {
                return [$item[$k->kode_kriteria]];
            }, $matriksKeputusan), 0);

            $max = !empty($values) ? max($values) : 1;
            $min = !empty($values) ? min($values) : 1;

            foreach ($matriksKeputusan as $id_siswa => $data) {
                $matriksNormalisasi[$id_siswa]['nama'] = $data['nama']; // Menyimpan nama siswa

                if ($k->jenis_atribut == 'B') {
                    // Normalisasi kriteria jenis_atribut benefit
                    $matriksNormalisasi[$id_siswa][$k->kode_kriteria] = $max != 0 ? $data[$k->kode_kriteria] / $max : 0;
                } elseif ($k->jenis_atribut == 'C') {
                    // Normalisasi kriteria tipe cost
                    $matriksNormalisasi[$id_siswa][$k->kode_kriteria] = $data[$k->kode_kriteria] != 0 ? $min / $data[$k->kode_kriteria] : 0;
                }
            }
        }
        return $matriksNormalisasi;
    }

    private function getBobotKriteria($kriteria)
    {
        $bobotKriteria = [];
        foreach ($kriteria as $k) {
            $bobotKriteria[$k->kode_kriteria] = $k->bobot_kriteria / 100; // Konversi bobot ke bentuk proporsional
        }
        return $bobotKriteria;
    }

    private function hitungNilaiAkhir($matriksNormalisasi, $bobotKriteria)
    {
        $hasilPerhitungan = [];
        foreach ($matriksNormalisasi as $id_siswa => $data) {
            $nilaiAkhir = 0;
            foreach ($bobotKriteria as $kodeKriteria => $bobot) {
                $nilaiAkhir += $data[$kodeKriteria] * $bobot;
            }
            $hasilPerhitungan[] = [
                'nama' => $data['nama'],
                'nilai' => $nilaiAkhir
            ];
        }
        return $hasilPerhitungan;
    }



    function laporan(){
       $e = $this->getRangkingData();
       $data = $e->getData();
       return view('admin.rangking.laporan', $data);
    }

    function cetak($numberOfStudents){
       $e = $this->getRangkingData();
       $data = $e->getData();
       $hasilPerhitungan = $data['hasilPerhitungan'];
       $kriteria = $data['kriteria'];
   
       // Limit the number of students based on $numberOfStudents
       if ($numberOfStudents !== 'all') {
           $numberOfStudents = intval($numberOfStudents);
           $hasilPerhitungan = array_slice($hasilPerhitungan, 0, $numberOfStudents);
       }

       $e = [
        'hasilPerhitungan' => $hasilPerhitungan,
        'kriteria' => $kriteria,
       ];

        $pdf = PDF::loadView('admin.rangking.laporan_pdf',$e);
       
        return $pdf->stream('laporan_ranking_siswa.pdf');
    }


}
