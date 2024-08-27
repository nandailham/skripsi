<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenilaianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('penilaian')->insert([
            // Penilaian untuk Siswa 1
            [
                'kode_kriteria' => 'C1',
                'id_user' => 1,
                'id_siswa' => 8,
                'nilai' => 80,
                'status_penilaian' => 'Valid',
            ],
            [
                'kode_kriteria' => 'C2',
                'id_user' => 1,
                'id_siswa' => 8,
                'nilai' => 70,
                'status_penilaian' => 'Valid',
            ],
            [
                'kode_kriteria' => 'C3',
                'id_user' => 1,
                'id_siswa' => 8,
                'nilai' => 85,
                'status_penilaian' => 'Valid',
            ],
            [
                'kode_kriteria' => 'C4',
                'id_user' => 1,
                'id_siswa' => 8,
                'nilai' => 10,
                'status_penilaian' => 'Valid',
            ],
            // Penilaian untuk Siswa 2
            [
                'kode_kriteria' => 'C1',
                'id_user' => 1,
                'id_siswa' => 9,
                'nilai' => 75,
                'status_penilaian' => 'Valid',
            ],
            [
                'kode_kriteria' => 'C2',
                'id_user' => 1,
                'id_siswa' => 9,
                'nilai' => 85,
                'status_penilaian' => 'Valid',
            ],
            [
                'kode_kriteria' => 'C3',
                'id_user' => 1,
                'id_siswa' => 9,
                'nilai' => 90,
                'status_penilaian' => 'Valid',
            ],
            [
                'kode_kriteria' => 'C4',
                'id_user' => 1,
                'id_siswa' => 9,
                'nilai' => 8,
                'status_penilaian' => 'Valid',
            ],
            // Penilaian untuk Siswa 3
            [
                'kode_kriteria' => 'C1',
                'id_user' => 1,
                'id_siswa' => 10,
                'nilai' => 90,
                'status_penilaian' => 'Valid',
            ],
            [
                'kode_kriteria' => 'C2',
                'id_user' => 1,
                'id_siswa' => 10,
                'nilai' => 80,
                'status_penilaian' => 'Valid',
            ],
            [
                'kode_kriteria' => 'C3',
                'id_user' => 1,
                'id_siswa' => 10,
                'nilai' => 88,
                'status_penilaian' => 'Valid',
            ],
            [
                'kode_kriteria' => 'C4',
                'id_user' => 1,
                'id_siswa' => 10,
                'nilai' => 9,
                'status_penilaian' => 'Valid',
            ],
            // Penilaian untuk Siswa 4
            [
                'kode_kriteria' => 'C1',
                'id_user' => 1,
                'id_siswa' => 11,
                'nilai' => 70,
                'status_penilaian' => 'Valid',
            ],
            [
                'kode_kriteria' => 'C2',
                'id_user' => 1,
                'id_siswa' => 11,
                'nilai' => 75,
                'status_penilaian' => 'Valid',
            ],
            [
                'kode_kriteria' => 'C3',
                'id_user' => 1,
                'id_siswa' => 11,
                'nilai' => 80,
                'status_penilaian' => 'Valid',
            ],
            [
                'kode_kriteria' => 'C4',
                'id_user' => 1,
                'id_siswa' => 11,
                'nilai' => 12,
                'status_penilaian' => 'Valid',
            ],
            // Penilaian untuk Siswa 5
            [
                'kode_kriteria' => 'C1',
                'id_user' => 1,
                'id_siswa' => 12,
                'nilai' => 85,
                'status_penilaian' => 'Valid',
            ],
            [
                'kode_kriteria' => 'C2',
                'id_user' => 1,
                'id_siswa' => 12,
                'nilai' => 78,
                'status_penilaian' => 'Valid',
            ],
            [
                'kode_kriteria' => 'C3',
                'id_user' => 1,
                'id_siswa' => 12,
                'nilai' => 82,
                'status_penilaian' => 'Valid',
            ],
            [
                'kode_kriteria' => 'C4',
                'id_user' => 1,
                'id_siswa' => 12,
                'nilai' => 11,
                'status_penilaian' => 'Valid',
            ],
        ]);
    }
}
