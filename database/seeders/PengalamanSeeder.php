<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PengalamanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pengalaman')->insert([
            [
                'id_profil' => 1,
                'posisi' => "System Analyst",
                'perusahaan' => "Pledis Entertainment",
                'tgl_mulai' => "2015-05",
                'tgl_selesai' => "2023-05",
            ],
            [
                'id_profil' => 2,
                'posisi' => "Business Analyst",
                'perusahaan' => "Pledis Entertainment",
                'tgl_mulai' => "2015-05",
                'tgl_selesai' => "2023-05",
            ],
            [
                'id_profil' => 3,
                'posisi' => "Quality Assurance",
                'perusahaan' => "Pledis Entertainment",
                'tgl_mulai' => "2015-05",
                'tgl_selesai' => "2023-05",
            ],
            [
                'id_profil' => 4,
                'posisi' => "KOL Specialist",
                'perusahaan' => "Pledis Entertainment",
                'tgl_mulai' => "2015-05",
                'tgl_selesai' => "2023-05",
            ],
            [
                'id_profil' => 5,
                'posisi' => "Social Media Manager",
                'perusahaan' => "Pledis Entertainment",
                'tgl_mulai' => "2015-05",
                'tgl_selesai' => "2023-05",
            ],
        ]);
    }
}
