<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LowonganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('lowongan')->insert([
            [
                'id_pengguna' => 1,
                'deskripsi' => 'Kesempatan besar untuk bergabung dengan tim kreatif kami.',
                'posisi' => 'UI/UX Designer',
                'kompetisi' => 'Hackathon Nasional 2024',
                'deskripsi_kerja' => 'Mendesain antarmuka pengguna yang intuitif dan menarik.',
                'tgl_posting' => now()->subDays(2),
            ],
            [
                'id_pengguna' => 2,
                'deskripsi' => 'Kami mencari individu berbakat dengan passion di bidang desain.',
                'posisi' => 'Full Stack Developer',
                'kompetisi' => 'Startup Weekend 2024',
                'deskripsi_kerja' => 'Mengembangkan aplikasi web dari frontend hingga backend.',
                'tgl_posting' => now()->subDays(5),
            ],
            [
                'id_pengguna' => 2,
                'deskripsi' => 'Jadilah bagian dari revolusi teknologi dengan peran penting ini.',
                'posisi' => 'Data Scientist',
                'kompetisi' => 'Data Science Challenge 2024',
                'deskripsi_kerja' => 'Menganalisis data dan memberikan insights yang berguna.',
                'tgl_posting' => now()->subDays(10),
            ],
            [
                'id_pengguna' => 1,
                'deskripsi' => 'Posisi menarik untuk pengembang dengan kemampuan tinggi.',
                'posisi' => 'Mobile Developer',
                'kompetisi' => 'App Innovation Contest 2024',
                'deskripsi_kerja' => 'Mengembangkan aplikasi mobile yang inovatif dan user-friendly.',
                'tgl_posting' => now()->subDays(3),
            ],
            [
                'id_pengguna' => 2,
                'deskripsi' => 'Kami mencari desainer berpengalaman untuk proyek besar kami.',
                'posisi' => 'Graphic Designer',
                'kompetisi' => 'Creative Arts Competition 2024',
                'deskripsi_kerja' => 'Membuat desain grafis yang menarik untuk berbagai media.',
                'tgl_posting' => now()->subDays(7),
            ],
            [
                'id_pengguna' => 1,
                'deskripsi' => 'Bergabunglah dengan tim pengembang perangkat lunak kami yang dinamis.',
                'posisi' => 'Software Engineer',
                'kompetisi' => 'Tech Fest 2024',
                'deskripsi_kerja' => 'Membangun dan memelihara sistem perangkat lunak yang kompleks.',
                'tgl_posting' => now()->subDays(1),
            ],
        ]);
    }
}
