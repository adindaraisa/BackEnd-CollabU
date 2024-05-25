<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PendidikanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pendidikan')->insert([
            [
                'id_profil' => 1,
                'id_prodi' => 1,
                'id_jurusan' => 1,
                'tahun_masuk' => 2022,
            ],
            [
                'id_profil' => 2,
                'id_prodi' => 2,
                'id_jurusan' => 1,
                'tahun_masuk' => 2022,
            ],
            [
                'id_profil' => 3,
                'id_prodi' => 3,
                'id_jurusan' => 2,
                'tahun_masuk' => 2022,
            ],
            [
                'id_profil' => 4,
                'id_prodi' => 4,
                'id_jurusan' => 2,
                'tahun_masuk' => 2022,
            ],
            [
                'id_profil' => 5,
                'id_prodi' => 5,
                'id_jurusan' => 3,
                'tahun_masuk' => 2022,
            ],
        ]);
    }
}
