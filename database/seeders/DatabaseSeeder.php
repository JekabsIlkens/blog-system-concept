<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->count(3)->create()->each(function ($user) 
        {    
            Post::factory()->count(2)->create(['author_id' => $user->id]);
        });
    }
}
