<?php

namespace App\Http\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Post;

interface PostsServiceInterface
{
    public function getAllPosts(): Collection;

    public function getSinglePost($id): Post;

    public function searchForPosts(array $data): Collection;

    public function createPost(array $data): Post;

    public function editPost($id, array $data): Post;

    public function deletePost($id): void;
}