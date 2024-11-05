<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Post;

class CommentFactory extends Factory
{
    public function definition(): array
    {
        return 
        [
            'comment' => fake()->randomElement([
                "I can't wait for part 2 of this story! When can we expect it?",
                "I completely disagree... a bunch of nonsense.",
                "Thanks for sharing! It was very helpful :)",
                "If you are interested in a business deal you can contact me through greg.tech@mail.com",
                "What language is this? Can someone translate it for me?"
            ]),
            'user_id' => User::factory(),
            'post_id' => Post::factory()
        ];
    }
}
