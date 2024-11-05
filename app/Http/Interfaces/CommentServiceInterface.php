<?php

namespace App\Http\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface CommentServiceInterface
{
    public function getPostComments($id): Collection;
}