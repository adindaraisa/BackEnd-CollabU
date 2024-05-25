<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(PerguruanTinggiSeeder::class);
        $this->call(JurusanSeeder::class);
        $this->call(PenggunaSeeder::class);
        $this->call(ProdiSeeder::class);
        $this->call(ProfilSeeder::class);
        $this->call(LowonganSeeder::class);
        $this->call(AngkatanLowonganSeeder::class);
        $this->call(ProdiLowonganSeeder::class);
    }
}
