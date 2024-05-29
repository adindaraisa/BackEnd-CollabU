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
                'id_jurusan' => 1,
                'id_prodi' => 1,
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
                'id_jurusan' => 1,
                'id_prodi' => 2,
            ],
            [
                'email' => 'reni.jkt@gmail.com',
                'password' => Crypt::encryptString('reni'),
                'nama_lengkap' => 'Reni Oktavia',
                'nama_panggilan' => 'Reni',
                'tanggal_lahir' => Carbon::createFromDate(1998, 3, 14),
                'jenis_kelamin' => 'Wanita',
                'no_telp' => '081223344556',
                'id_pt' => 1,
                'id_jurusan' => 2,
                'id_prodi' => 3,
            ],
            [
                'email' => 'agus_budi@gmail.com',
                'password' => Crypt::encryptString('agusbudi'),
                'nama_lengkap' => 'Agus Budi Santoso',
                'nama_panggilan' => 'Agus',
                'tanggal_lahir' => Carbon::createFromDate(2000, 7, 19),
                'jenis_kelamin' => 'Pria',
                'no_telp' => '082345678901',
                'id_pt' => 1,
                'id_jurusan' => 3,
                'id_prodi' => 5,
            ],
            [
                'email' => 'fitria.sari@gmail.com',
                'password' => Crypt::encryptString('fitriasari'),
                'nama_lengkap' => 'Fitria Sari',
                'nama_panggilan' => 'Fitri',
                'tanggal_lahir' => Carbon::createFromDate(2002, 11, 30),
                'jenis_kelamin' => 'Wanita',
                'no_telp' => '081234567890',
                'id_pt' => 1,
                'id_jurusan' => 4,
                'id_prodi' => 7,
            ],
            [
                'email' => 'mingyu@gmail.com',
                'password' => Crypt::encryptString('mingyu'),
                'nama_lengkap' => 'Kim Mingyu',
                'nama_panggilan' => 'Mingyu',
                'tanggal_lahir' => Carbon::createFromDate(1997, 4, 6),
                'jenis_kelamin' => 'Pria',
                'no_telp' => '081234567890',
                'id_pt' => 1,
                'id_jurusan' => 1,
                'id_prodi' => 1,
            ],
            [
                'email' => 'seungcheol@gmail.com',
                'password' => Crypt::encryptString('seungcheol'),
                'nama_lengkap' => 'Choi Seungcheol',
                'nama_panggilan' => 'Seungcheol',
                'tanggal_lahir' => Carbon::createFromDate(1995, 8, 8),
                'jenis_kelamin' => 'Pria',
                'no_telp' => '081234567890',
                'id_pt' => 1,
                'id_jurusan' => 2,
                'id_prodi' => 4,
            ],
            [
                'email' => 'joshua@gmail.com',
                'password' => Crypt::encryptString('joshua'),
                'nama_lengkap' => 'Hong Joshua',
                'nama_panggilan' => 'Joshua',
                'tanggal_lahir' => Carbon::createFromDate(1995, 12, 30),
                'jenis_kelamin' => 'Pria',
                'no_telp' => '081234567890',
                'id_pt' => 1,
                'id_jurusan' => 3,
                'id_prodi' => 5,
            ],
            [
                'email' => 'wonwoo@gmail.com',
                'password' => Crypt::encryptString('wonwoo'),
                'nama_lengkap' => 'Jeon Wonwoo',
                'nama_panggilan' => 'Wonwoo',
                'tanggal_lahir' => Carbon::createFromDate(1996, 7, 17),
                'jenis_kelamin' => 'Pria',
                'no_telp' => '081234567890',
                'id_pt' => 1,
                'id_jurusan' => 1,
                'id_prodi' => 1,
            ],
            [
                'email' => 'minghao@gmail.com',
                'password' => Crypt::encryptString('minghao'),
                'nama_lengkap' => 'Xu Minghao',
                'nama_panggilan' => 'Minghao',
                'tanggal_lahir' => Carbon::createFromDate(1997, 11, 7),
                'jenis_kelamin' => 'Pria',
                'no_telp' => '081234567890',
                'id_pt' => 2,
                'id_jurusan' => 5,
                'id_prodi' => 8,
            ],
        ]);
    }
}
