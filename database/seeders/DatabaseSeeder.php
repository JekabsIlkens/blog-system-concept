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
        Category::create(['name' => 'Business', 'slug' => 'business']);
        Category::create(['name' => 'Finance', 'slug' => 'finance']);
        Category::create(['name' => 'Marketing', 'slug' => 'marketing']);
        Category::create(['name' => 'Education', 'slug' => 'education']);
        Category::create(['name' => 'Science', 'slug' => 'science']);
        Category::create(['name' => 'Environment', 'slug' => 'environment']);
        Category::create(['name' => 'Travel', 'slug' => 'travel']);
        Category::create(['name' => 'Lifestyle', 'slug' => 'lifestyle']);
        Category::create(['name' => 'Fashion', 'slug' => 'fashion']);
        Category::create(['name' => 'Beauty', 'slug' => 'beauty']);
        Category::create(['name' => 'Food', 'slug' => 'food']);
        Category::create(['name' => 'Recipes', 'slug' => 'recipes']);
        Category::create(['name' => 'Fitness', 'slug' => 'fitness']);
        Category::create(['name' => 'Relationships', 'slug' => 'relationships']);
        Category::create(['name' => 'Personal Development', 'slug' => 'personal-development']);
        Category::create(['name' => 'Mental Health', 'slug' => 'mental-health']);
        Category::create(['name' => 'How To', 'slug' => 'how-to']);
        Category::create(['name' => 'Gardening', 'slug' => 'gardening']);
        Category::create(['name' => 'Pets', 'slug' => 'pets']);
        Category::create(['name' => 'Real Estate', 'slug' => 'real-estate']);
        Category::create(['name' => 'Entertainment', 'slug' => 'entertainment']);
        Category::create(['name' => 'Books', 'slug' => 'books']);
        Category::create(['name' => 'Movies', 'slug' => 'movies']);
        Category::create(['name' => 'Music', 'slug' => 'music']);
        Category::create(['name' => 'Art', 'slug' => 'art']);
        Category::create(['name' => 'Photography', 'slug' => 'photography']);

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
