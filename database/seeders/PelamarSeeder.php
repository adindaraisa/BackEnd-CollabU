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
                'id_pengguna' => 2,
                'created_at' => now()->subDays(2),
            ],
            [
                'id_lowongan' => 1,
                'id_pengguna' => 3,
                'created_at' => now()->subDays(3),
            ],
            [
                'id_lowongan' => 2,
                'id_pengguna' => 1,
                'created_at' => now()->subDays(4),

            ],
            [
                'id_lowongan' => 2,
                'id_pengguna' => 3,
                'created_at' => now()->subDays(5),
            ],
            [
                'id_lowongan' => 2,
                'id_pengguna' => 5,
                'created_at' => now()->subDays(6),
            ],
            [
                'id_lowongan' => 3,
                'id_pengguna' => 2,
                'created_at' => now()->subDays(7),
            ],
            [
                'id_lowongan' => 3,
                'id_pengguna' => 4,
                'created_at' => now()->subDays(8),
            ],
            [
                'id_lowongan' => 5,
                'id_pengguna' => 1,
                'created_at' => now()->subDays(10),
            ],
            [
                'id_lowongan' => 6,
                'id_pengguna' => 2,
                'created_at' => now()->subDays(11),
            ],
        ]);
    }
}
