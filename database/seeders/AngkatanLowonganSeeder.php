<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AngkatanLowonganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('lowongan_angkatan')->insert([
            [
                'id_lowongan' => 1,
                'angkatan' => '2020',
            ],
            [
                'id_lowongan' => 1,
                'angkatan' => '2021',
            ],
            [
                'id_lowongan' => 2,
                'angkatan' => '2021',
            ],
            [
                'id_lowongan' => 2,
                'angkatan' => '2022',
            ],
            [
                'id_lowongan' => 3,
                'angkatan' => '2020',
            ],
            [
                'id_lowongan' => 4,
                'angkatan' => '2023',
            ],
            [
                'id_lowongan' => 5,
                'angkatan' => '2023',
            ],
            [
                'id_lowongan' => 6,
                'angkatan' => '2022',
            ],
            [
                'id_lowongan' => 6,
                'angkatan' => '2023',
            ],
        ]);
    }
}
