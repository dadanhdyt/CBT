<?php

namespace Database\Seeders;

use App\Models\Matpel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MatpelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Matpel::create([
            "kode_mapel" => rand(100,1000),
            "nama" => "IPA",
            "agama_id" => null,
            'jurusan_id' => null,
        ]);
        Matpel::create([
            "kode_mapel" => rand(100,1000),
            "nama" => "Matematika",
            "agama_id" => null,
            'jurusan_id' => null,
        ]);
        Matpel::create([
            "kode_mapel" => rand(100,1000),
            "nama" => "Bahasa Inggris",
            "agama_id" => null,
            'jurusan_id' => null,
        ]);
    }
}
