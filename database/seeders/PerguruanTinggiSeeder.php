<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PerguruanTinggiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('perguruantinggi')->insert([
            [
                'perguruan_tinggi' => 'Politeknik Negeri Bandung',
            ],
            [
                'perguruan_tinggi' => 'Universitas Pendidikan Indonesia',
            ],
        ]);
    }
}
