<?php

namespace Database\Seeders;

use App\Models\Agama;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AgamaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $agama = [
            'Islam',
            'Kristen Protestan',
            'Kristen Katolik',
            'Hindu',
            'Buddha',
            'Khonghucu'
        ];
        foreach ($agama as $key => $value) {
            Agama::create(['nama'=>$value]);
        }

    }
}
