<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('siswa')->insert([
            [
                'nama' => 'Siswa 1',
                'jenis_kelamin' => 'L',
                'kelas_siswa' => 4
            ],
            [
                'nama' => 'Siswa 2',
                'jenis_kelamin' => 'P',
                'kelas_siswa' => 4
            ],
            [
                'nama' => 'Siswa 3',
                'jenis_kelamin' => 'L',
                'kelas_siswa' => 4
            ],
            [
                'nama' => 'Siswa 4',
                'jenis_kelamin' => 'P',
                'kelas_siswa' => 4
            ],
            [
                'nama' => 'Siswa 5',
                'jenis_kelamin' => 'L',
                'kelas_siswa' => 4
            ]
        ]);
    }
}
