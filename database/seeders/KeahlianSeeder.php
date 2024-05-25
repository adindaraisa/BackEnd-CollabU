<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KeahlianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('keahlian')->insert([
            [
                'id_profil' => 1,
                'keahlian' => "Menari",
            ],
            [
                'id_profil' => 2,
                'keahlian' => "Menyanyi",
            ],
            [
                'id_profil' => 3,
                'keahlian' => "Fire Bending",
            ],
            [
                'id_profil' => 4,
                'keahlian' => "Earth Bending",
            ],
            [
                'id_profil' => 5,
                'keahlian' => "Water Bending",
            ],
        ]);
    }
}
