<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class PostFactory extends Factory
{
    protected static ?string $password;

    public function definition(): array
    {
        return 
        [
            'title' => "Life hacks for " . fake()->jobTitle() . "s",
            'body' => fake()->paragraph(12, true),
            'created_at' => $this->faker->dateTimeBetween('-3 years', 'now'),
            'updated_at' => now(),
            'author_id' => User::factory()
        ];
    }
}