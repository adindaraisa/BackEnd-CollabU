<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PenggunaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'email' => 'adinda123@gmail.com',
                'password' => Crypt::encryptString('adinda'),
                'nama' => 'Adinda',
                'tahun_masuk' => '2022',
                'id_jurusan' => 1,
                'id_perguruan_tinggi' => 1,
            ],
            [
                'email' => 'agung123@gmail.com',
                'password' => Crypt::encryptString('agung'),
                'nama' => 'Agung',
                'tahun_masuk' => '2022',
                'id_jurusan' => 2,
                'id_perguruan_tinggi' => 1,
            ],
        ]);
    }
}
