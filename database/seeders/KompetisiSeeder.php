<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KompetisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kompetisi')->insert([
            [
                'nama_kompetisi' => 'Kompetisi Pertama',
                'tgl_mulai' => '2024-07-01',
                'tgl_selesai' => '2024-07-10',
                'deskripsi' => 'Ini adalah kompetisi pertama yang diadakan.',
                'poster' => 'poster/kmipn.jpg',
            ],
            [
                'nama_kompetisi' => 'Kompetisi Kedua',
                'tgl_mulai' => '2024-08-15',
                'tgl_selesai' => '2024-08-25',
                'deskripsi' => 'Ini adalah kompetisi kedua yang diadakan.',
                'poster' => 'poster/kmipn.jpg',
            ],
            [
                'nama_kompetisi' => 'Kompetisi Ketiga',
                'tgl_mulai' => '2024-09-20',
                'tgl_selesai' => '2024-09-30',
                'deskripsi' => 'Ini adalah kompetisi ketiga yang diadakan.',
                'poster' => 'poster/kmipn.jpg',
            ],
        ]);
    }
}
