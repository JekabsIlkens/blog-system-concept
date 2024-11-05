<?php

namespace App\Http\Services;

use App\Http\Interfaces\CategoryServiceInterface;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Category;

class CategoryService implements CategoryServiceInterface
{
    public function getAllCategories(): Collection
    {
        return Category::all();
    }
}