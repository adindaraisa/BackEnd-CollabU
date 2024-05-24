<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdiLowonganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('lowongan_prodi')->insert([
            [
                'id_lowongan' => 1,
                'id_prodi' => 1,
            ],
            [
                'id_lowongan' => 1,
                'id_prodi' => 2,
            ],
            [
                'id_lowongan' => 1,
                'id_prodi' => 3,
            ],
            [
                'id_lowongan' => 1,
                'id_prodi' => 4,
            ],
            [
                'id_lowongan' => 2,
                'id_prodi' => 1,
            ],
            [
                'id_lowongan' => 2,
                'id_prodi' => 2,
            ],
            [
                'id_lowongan' => 2,
                'id_prodi' => 3,
            ],
            [
                'id_lowongan' => 3,
                'id_prodi' => 3,
            ],
            [
                'id_lowongan' => 3,
                'id_prodi' => 4,
            ],
        ]);
    }
}
