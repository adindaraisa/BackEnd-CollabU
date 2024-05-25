<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PrestasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('prestasi')->insert([
            [
                'id_profil' => 1,
                'nama_penghargaan' => "Kompetisi Mahasiswa Informatika Politeknik Nasional",
                'kategori' => "Best Design UI/UX",
                'tahun' => "2022",
            ],
            [
                'id_profil' => 2,
                'nama_penghargaan' => "Kompetisi Mahasiswa Informatika Politeknik Nasional",
                'kategori' => "Favorite Team",
                'tahun' => "2022",
            ],
            [
                'id_profil' => 3,
                'nama_penghargaan' => "Kompetisi Mahasiswa Informatika Politeknik Nasional",
                'kategori' => "Juara 1 Hackathon",
                'tahun' => "2022",
            ],
            [
                'id_profil' => 4,
                'nama_penghargaan' => "Kompetisi Mahasiswa Informatika Politeknik Nasional",
                'kategori' => "Juara 2 Cipta Inovasi",
                'tahun' => "2022",
            ],
            [
                'id_profil' => 5,
                'nama_penghargaan' => "Kompetisi Mahasiswa Informatika Politeknik Nasional",
                'kategori' => "Juara 1 E-Government",
                'tahun' => "2022",
            ],
        ]);
    }
}
