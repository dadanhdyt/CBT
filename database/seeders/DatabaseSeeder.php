<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Jurusan;
use App\Models\Matpel;
use App\Models\Peserta;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
     $this->call(AgamaSeeder::class);
     $this->call(JurusanSeeder::class);
     $this->call(PesertaSeeder::class);
     $this->call(MatpelSeeder::class);
    }
}
