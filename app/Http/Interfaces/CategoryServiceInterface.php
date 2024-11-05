<?php

namespace App\Http\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface CategoryServiceInterface
{
    public function getAllCategories(): Collection;

    public function getPostCategories($id): Collection;
}