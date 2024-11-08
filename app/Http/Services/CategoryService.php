<?php

namespace App\Http\Services;

use App\Http\Interfaces\CategoryServiceInterface;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Category;
use App\Models\Post;

class CategoryService implements CategoryServiceInterface
{
    public function getAllCategories(): Collection
    {
        return Category::all();
    }

    public function getPostCategories($id): Collection
    {
        $post = Post::findOrFail($id);

        return $post->categories;
    }
}