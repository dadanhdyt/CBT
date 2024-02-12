<?php

namespace Database\Seeders;

use App\Models\BankSoal;
use App\Models\Jadwal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Jadwal::create([
            "nama" => "UAS - 2024",
            "tanggal" => now()->format('Y-m-d'),
            "waktu_mulai" => now()->format("h:i:s"),
            "lama_ujian" => 30,
            'minimal_soal_diisi' => 5,
            'bank_soal_ids' => json_encode(BankSoal::all()->pluck('id')),
            'status' => 1,
        ]);
    }
}
