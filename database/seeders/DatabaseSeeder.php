<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->count(5)->create()->each(function ($user) 
        {    
            Post::factory()->count(1)->create(['author_id' => $user->id]);
        });
    }
}
