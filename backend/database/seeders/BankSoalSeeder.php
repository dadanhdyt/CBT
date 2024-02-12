<?php

namespace Database\Seeders;

use App\Models\BankSoal;
use App\Models\Matpel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BankSoalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BankSoal::create([
            'total_soal_pg' => rand(0,10),
            'total_soal_essay' => rand(3,10),
            'persen' => 100,
            'matpel_id' => Matpel::inRandomOrder()->first()->id,
        ]);
        BankSoal::create([
            'total_soal_pg' => rand(0,10),
            'total_soal_essay' => rand(3,10),
            'persen' => 100,
            'matpel_id' => Matpel::inRandomOrder()->first()->id,
        ]);
        BankSoal::create([
            'total_soal_pg' => rand(0,10),
            'total_soal_essay' => rand(3,10),
            'persen' => 100,
            'matpel_id' => Matpel::inRandomOrder()->first()->id,
        ]);

    }
}
