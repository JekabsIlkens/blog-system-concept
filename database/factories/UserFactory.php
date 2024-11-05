<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    public function definition(): array
    {
        return 
        [
            'full_name' => fake()->firstName() . " " . fake()->lastName(),
            'email' => fake()->unique()->safeEmail(),
            'password' => Hash::make('password')
        ];
    }
}