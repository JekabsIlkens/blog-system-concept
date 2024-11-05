<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::factory()->count(5)->create();

        // Step 2: For each user, create a set number of posts
        $users->each(function ($user) use ($users) 
        {
            $posts = Post::factory()->count(rand(1, 3))->create(['author_id' => $user->id]);

            // Step 3: For each post, create random comments from other users
            $posts->each(function ($post) use ($users) 
            {
                // Choose random users to comment on the post
                $commentingUsers = $users->random(rand(1, 4)); // Select 1-4 random users to comment
                
                // Generate a random number of comments for each selected user
                foreach ($commentingUsers as $commentingUser) 
                {
                    Comment::factory()->count(rand(1, 2))->create([
                        'post_id' => $post->id,
                        'user_id' => $commentingUser->id,
                    ]);
                }
            });
        });
    }
}
