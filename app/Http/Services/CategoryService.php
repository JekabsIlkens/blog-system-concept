<?php

namespace App\Http\Services;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Category;
use App\Models\Post;

class CategoryService
{
    public function getAllCategories(): Collection
    {
        return Category::all();
    }

    public function getCategoriesByPostId($id): Collection
    {
        $post = Post::findOrFail($id);

        return $post->categories;
    }
}
