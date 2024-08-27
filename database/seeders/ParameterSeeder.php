<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParameterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('parameter')->insert([
            // Kriteria Pengetahuan
            [
                'kode_kriteria' => 'C1',
                'nilai_v' => '<=54',
                'bobot' => 1,
            ],
            [
                'kode_kriteria' => 'C1',
                'nilai_v' => '55-64',
                'bobot' => 2,
            ],
            [
                'kode_kriteria' => 'C1',
                'nilai_v' => '65-74',
                'bobot' => 3,
            ],
            [
                'kode_kriteria' => 'C1',
                'nilai_v' => '75-84',
                'bobot' => 4,
            ],
            [
                'kode_kriteria' => 'C1',
                'nilai_v' => '>=85',
                'bobot' => 5,
            ],
            // Kriteria Keterampilan
            [
                'kode_kriteria' => 'C2',
                'nilai_v' => '<=54',
                'bobot' => 1,
            ],
            [
                'kode_kriteria' => 'C2',
                'nilai_v' => '55-64',
                'bobot' => 2,
            ],
            [
                'kode_kriteria' => 'C2',
                'nilai_v' => '65-74',
                'bobot' => 3,
            ],
            [
                'kode_kriteria' => 'C2',
                'nilai_v' => '75-84',
                'bobot' => 4,
            ],
            [
                'kode_kriteria' => 'C2',
                'nilai_v' => '>=85',
                'bobot' => 5,
            ],
            // Kriteria Sikap
            [
                'kode_kriteria' => 'C3',
                'nilai_v' => '<=54',
                'bobot' => 1,
            ],
            [
                'kode_kriteria' => 'C3',
                'nilai_v' => '55-64',
                'bobot' => 2,
            ],
            [
                'kode_kriteria' => 'C3',
                'nilai_v' => '65-74',
                'bobot' => 3,
            ],
            [
                'kode_kriteria' => 'C3',
                'nilai_v' => '75-84',
                'bobot' => 4,
            ],
            [
                'kode_kriteria' => 'C3',
                'nilai_v' => '>=85',
                'bobot' => 5,
            ],
            // Kriteria Absensi (Cost)
            [
                'kode_kriteria' => 'C4',
                'nilai_v' => '>=15',
                'bobot' => 1,
            ],
            [
                'kode_kriteria' => 'C4',
                'nilai_v' => '10-14',
                'bobot' => 2,
            ],
            [
                'kode_kriteria' => 'C4',
                'nilai_v' => '5-9',
                'bobot' => 3,
            ],
            [
                'kode_kriteria' => 'C4',
                'nilai_v' => '1-4',
                'bobot' => 4,
            ],
            [
                'kode_kriteria' => 'C4',
                'nilai_v' => '<=0',
                'bobot' => 5,
            ],
        ]);
    }
}
