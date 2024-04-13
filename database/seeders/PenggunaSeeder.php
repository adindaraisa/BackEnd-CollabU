<?php

namespace Database\Seeders;

use Carbon\Carbon;
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
        DB::table('pengguna')->insert([
            [
                'email' => 'adinda123@gmail.com',
                'password' => Crypt::encryptString('adinda'),
                'nama_lengkap' => 'Adinda Raisa Az-zahra',
                'nama_panggilan' => 'Adinda',
                'tanggal_lahir' => Carbon::createFromDate(2004, 5, 11),
                'jenis_kelamin' => 'Wanita',
                'no_telp' => '08990918911',
                'id_pt' => 1,
            ],
            [
                'email' => 'jeonghan@gmail.com',
                'password' => Crypt::encryptString('jeonghan'),
                'nama_lengkap' => 'Yoon Jeonghan',
                'nama_panggilan' => 'Jeonghan',
                'tanggal_lahir' => Carbon::createFromDate(1995, 10, 4),
                'jenis_kelamin' => 'Pria',
                'no_telp' => '085563326633',
                'id_pt' => 1,
            ],
        ]);
    }
}
