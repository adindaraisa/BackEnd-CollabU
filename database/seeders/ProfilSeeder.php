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
            ],
            [
                'id_pengguna' => '2',
                'tentang_saya' => 'Sangat Fenomenal Sekali',
            ],
        ]);
    }
}
