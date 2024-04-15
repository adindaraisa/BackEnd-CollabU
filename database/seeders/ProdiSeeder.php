<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('prodi')->insert([
            [
                'id_jurusan' => '1',
                'nama_prodi' => 'D3 Teknik Informatika',
            ],
            [
                'id_jurusan' => '1',
                'nama_prodi' => 'D4 Teknik Informatika',
            ],
            [
                'id_pt' => '2',
                'nama_jurusan' => 'D3 Teknik Mesin',
            ],
            [
                'id_pt' => '3',
                'nama_jurusan' => 'D3 Administrasi Bisnis',
            ],
        ]);
    }
}
