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
                'id_jurusan' => '2',
                'nama_prodi' => 'D3 Teknik Mesin',
            ],
            [
                'id_jurusan' => '2',
                'nama_prodi' => 'D3 Teknik Aeronautika',
            ],
            [
                'id_jurusan' => '3',
                'nama_prodi' => 'D3 Administrasi Bisnis',
            ],
            [
                'id_jurusan' => '3',
                'nama_prodi' => 'D3 Usaha Perjalanan Wisata',
            ],
            [    
                'id_jurusan' => '4',
                'nama_prodi' => 'S1 Akuntansi',
            ],
            [    
                'id_jurusan' => '5',
                'nama_prodi' => 'S1 Manajemen',
            ],
        ]);
    }
}
