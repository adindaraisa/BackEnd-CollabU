<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JurusanLowonganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('lowongan_jurusan')->insert([
            [
                'id_lowongan' => 1,
                'id_jurusan' => 1,
            ],
            [
                'id_lowongan' => 1,
                'id_jurusan' => 2,
            ],
            [
                'id_lowongan' => 1,
                'id_jurusan' => 3,
            ],
            [
                'id_lowongan' => 2,
                'id_jurusan' => 1,
            ],
            [
                'id_lowongan' => 2,
                'id_jurusan' => 2,
            ],
            [
                'id_lowongan' => 3,
                'id_jurusan' => 2,
            ],
            [
                'id_lowongan' => 3,
                'id_jurusan' => 3,
            ],
            [
                'id_lowongan' => 4,
                'id_jurusan' => 1,
            ],
            [
                'id_lowongan' => 5,
                'id_jurusan' => 1,
            ],
            [
                'id_lowongan' => 6,
                'id_jurusan' => 1,
            ],
        ]);
    }
}
