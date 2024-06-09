<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProfilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('profil')->insert([
            [
                'id_pengguna' => '1',
                'tentang_saya' => 'Sangat Fenomenal Sekali',
                'resume' => 'resume/adinda123_gmail_com.pdf',
            ],
            [
                'id_pengguna' => '2',
                'tentang_saya' => 'Sangat Fenomenal Sekali',
                'resume' => 'resume/adinda123_gmail_com.pdf',
            ],
            [
                'id_pengguna' => '3',
                'tentang_saya' => 'Sangat Fenomenal Sekali',
                'resume' => 'resume/adinda123_gmail_com.pdf',
            ],
            [
                'id_pengguna' => '4',
                'tentang_saya' => 'Sangat Fenomenal Sekali',
                'resume' => 'resume/adinda123_gmail_com.pdf',
            ],
            [
                'id_pengguna' => '5',
                'tentang_saya' => 'Sangat Fenomenal Sekali',
                'resume' => 'resume/adinda123_gmail_com.pdf',
            ],
            [
                'id_pengguna' => '6',
                'tentang_saya' => 'Sangat Fenomenal Sekali',
                'resume' => 'resume/adinda123_gmail_com.pdf',
            ],
            [
                'id_pengguna' => '7',
                'tentang_saya' => 'Sangat Fenomenal Sekali',
                'resume' => null,
            ],
            [
                'id_pengguna' => '8',
                'tentang_saya' => 'Sangat Fenomenal Sekali',
                'resume' => null,
            ],
            [
                'id_pengguna' => '9',
                'tentang_saya' => 'Sangat Fenomenal Sekali',
                'resume' => null,
            ],
            [
                'id_pengguna' => '10',
                'tentang_saya' => 'Sangat Fenomenal Sekali',
                'resume' => null,
            ],
        ]);
    }
}
