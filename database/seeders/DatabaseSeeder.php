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
        $categories = [
            ['name' => 'Business'],
            ['name' => 'Finance'],
            ['name' => 'Marketing'],
            ['name' => 'Education'],
            ['name' => 'Science'],
            ['name' => 'Environment'],
            ['name' => 'Travel'],
            ['name' => 'Lifestyle'],
            ['name' => 'Fashion'],
            ['name' => 'Beauty'],
            ['name' => 'Food'],
            ['name' => 'Recipes'],
            ['name' => 'Fitness'],
            ['name' => 'Relationships'],
            ['name' => 'Personal Development'],
            ['name' => 'Mental Health'],
            ['name' => 'How To'],
            ['name' => 'Gardening'],
            ['name' => 'Pets'],
            ['name' => 'Real Estate'],
            ['name' => 'Entertainment'],
            ['name' => 'Books'],
            ['name' => 'Movies'],
            ['name' => 'Music'],
            ['name' => 'Art'],
            ['name' => 'Photography'],
        ];

        foreach ($categories as $category) 
        {
            Category::create($category);
        }

        $allCategories = Category::all();
        $users = User::factory()->count(7)->create();
        
        $users->each(function ($user) use ($allCategories, $users)
        {
            $posts = Post::factory()->count(rand(1, 2))->create(['author_id' => $user->id]);
        
            $posts->each(function ($post) use ($allCategories, $users)
            {
                $randomCategories = $allCategories->random(rand(1, 5))->pluck('id');
                $post->categories()->attach($randomCategories);
        
                $commentingUsers = $users->random(rand(1, 5));
                foreach ($commentingUsers as $commentingUser) 
                {
                    Comment::factory()->count(rand(1, 1))->create([
                        'post_id' => $post->id,
                        'user_id' => $commentingUser->id,
                    ]);
                }
            });
        });
    }
}
