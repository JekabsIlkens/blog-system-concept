<?php

namespace App\Http\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Post;

interface PostsServiceInterface
{
    public function getAllPosts(): Collection;

    public function getSinglePost($id): Post;

    public function createPost(array $data): Post;
}