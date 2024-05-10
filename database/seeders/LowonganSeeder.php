<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LowonganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('lowongan')->insert([
            [
                'id_pengguna' => 1,
                'deskripsi' => 'Lorem ipsum',
                'posisi' => 'UI/UX Designer',
                'kompetisi' => 'Pekan Kreatifitas Mahasiswa',
                'deskripsi_kerja' => 'Kerja Kerja Kerja.',
                'tgl_posting' => now(),
            ],
            [
                'id_pengguna' => 2,
                'deskripsi' => 'Lorem ipsum',
                'posisi' => 'UI/UX Designer',
                'kompetisi' => 'Pekan Kreatifitas Mahasiswa',
                'deskripsi_kerja' => 'Kerja Kerja Kerja.',
                'tgl_posting' => now(),
            ],
            [
                'id_pengguna' => 3,
                'deskripsi' => 'Lorem ipsum',
                'posisi' => 'UI/UX Designer',
                'kompetisi' => 'Pekan Kreatifitas Mahasiswa',
                'deskripsi_kerja' => 'Kerja Kerja Kerja.',
                'tgl_posting' => now(),
            ],
            [
                'id_pengguna' => 4,
                'deskripsi' => 'Lorem ipsum',
                'posisi' => 'UI/UX Designer',
                'kompetisi' => 'Pekan Kreatifitas Mahasiswa',
                'deskripsi_kerja' => 'Kerja Kerja Kerja.',
                'tgl_posting' => now(),
            ],
            [
                'id_pengguna' => 5,
                'deskripsi' => 'Lorem ipsum',
                'posisi' => 'UI/UX Designer',
                'kompetisi' => 'Pekan Kreatifitas Mahasiswa',
                'deskripsi_kerja' => 'Kerja Kerja Kerja.',
                'tgl_posting' => now(),
            ],
            [
                'id_pengguna' => 6,
                'deskripsi' => 'Lorem ipsum',
                'posisi' => 'UI/UX Designer',
                'kompetisi' => 'Pekan Kreatifitas Mahasiswa',
                'deskripsi_kerja' => 'Kerja Kerja Kerja.',
                'tgl_posting' => now(),
            ],
        ]);
    }
}
