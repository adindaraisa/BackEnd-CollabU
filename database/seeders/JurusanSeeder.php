<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jurusan')->insert([
            [
                'id_pt' => '1',
                'nama_jurusan' => 'Teknik Komputer dan Informatika',
            ],
            [
                'id_pt' => '1',
                'nama_jurusan' => 'Teknik Mesin',
            ],
            [
                'id_pt' => '1',
                'nama_jurusan' => 'Administrasi Niaga',
            ],
        ]);
    }
}
