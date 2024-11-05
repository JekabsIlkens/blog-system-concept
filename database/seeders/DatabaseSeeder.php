<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Category::create(['name' => 'Technology', 'slug' => 'technology']);
        Category::create(['name' => 'Health', 'slug' => 'health']);

        $users = User::factory()->count(5)->create();

        $users->each(function ($user) use ($users) 
        {
            $posts = Post::factory()->count(rand(1, 3))->create(['author_id' => $user->id]);

            $posts->each(function ($post) use ($users) 
            {
                $commentingUsers = $users->random(rand(1, 4));
                
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
