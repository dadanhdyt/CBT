<?php

namespace Database\Seeders;

use App\Models\Jurusan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Jurusan::create([
            'nama' => 'Rekayasa Perangkat Lunak',
            'kode_jurusan' => "RPL",
        ]);
        Jurusan::create([
            'nama' => 'Multimedia',
            'kode_jurusan' => "MM",
        ]);
        Jurusan::create([
            'nama' => 'Teknik Kendaraan Ringan',
            'kode_jurusan' => "TKR",
        ]);


    }
}
