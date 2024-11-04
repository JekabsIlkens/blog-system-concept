<?php

namespace App\Http\Services;

use App\Http\Interfaces\PostsServiceInterface;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Post;

class PostsService implements PostsServiceInterface
{
    public function getAllPosts(): Collection
    {
        return Post::select('posts.*', 'users.id as author_id', 'users.full_name as author_name')
            ->leftJoin('users', 'posts.author_id', '=', 'users.id')
            ->get();
    }
}