<?php

namespace Database\Factories;

use App\Models\Agama;
use App\Models\Jurusan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Peserta>
 */
class PesertaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nomor_peserta' => strtoupper(rand()),
            'nama' => fake()->name(),
            'password' => password_hash('123',PASSWORD_DEFAULT),
            'status' => true,
            'agama_id' => Agama::inRandomOrder()->first()->id,
            'jurusan_id' => Jurusan::inRandomOrder()->first()->id,

        ];
    }
}
