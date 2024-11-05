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
                "What language is this? Can someone translate it for me?",
                "I want to learn this kind of style! Teach me.",
                "Awesome article! Im looking forward to reading more from you.",
                "This is a fantastic post! I learned so much about the topic.",
                "There are multiple typos in the 2nd paragraph... just letting you know.",
                "I recently contacted the post author and he gave me some spoilers for the next post.. he he he :)",
                "Did anyone start noticing these facts in their everyday life since reading this ????",
                "Thanks for the tips! I will definitely try them out.",
                "I think you missed a few key points here. It would be good to expand on this topic.",
                "Interesting perspective, but it doesn't fully address the complexities of the issue.",
                "This post did not really resonate with me. I expected something more engaging."
            ]),
            'user_id' => User::factory(),
            'post_id' => Post::factory()
        ];
    }
}
