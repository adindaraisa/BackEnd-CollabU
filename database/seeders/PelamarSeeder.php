<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PelamarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pelamar')->insert([
            [
                'id_lowongan' => 1,
                'id_pengguna' => 1,
            ],
            [
                'id_lowongan' => 1,
                'id_pengguna' => 2,
            ],
            [
                'id_lowongan' => 1,
                'id_pengguna' => 3,
            ],
            [
                'id_lowongan' => 2,
                'id_pengguna' => 1,
            ],
            [
                'id_lowongan' => 2,
                'id_pengguna' => 3,
            ],
            [
                'id_lowongan' => 2,
                'id_pengguna' => 5,
            ],
            [
                'id_lowongan' => 3,
                'id_pengguna' => 2,
            ],
            [
                'id_lowongan' => 3,
                'id_pengguna' => 4,
            ],
            [
                'id_lowongan' => 4,
                'id_pengguna' => 1,
            ],
            [
                'id_lowongan' => 6,
                'id_pengguna' => 2,
            ],
        ]);
    }
}
