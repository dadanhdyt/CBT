<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Ramsey\Uuid\Nonstandard\Uuid;
use Tests\TestCase;

class IdUUidTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_valid_uuid(): void
    {
        $user = User::create([
            'name' => fake()->name(),
            'email' => fake()->email(),
            'password' => fake()->password()
        ]);
        $this->assertTrue(Uuid::isValid($user->id));
    }

}
