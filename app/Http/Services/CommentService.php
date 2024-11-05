<?php

namespace App\Http\Services;

use App\Http\Interfaces\CommentServiceInterface;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Comment;

class CommentService implements CommentServiceInterface
{
    public function getPostComments($id): Collection
    {
        return Comment::where('post_id', $id)
            ->with('user:id,full_name')
            ->get(['id', 'comment', 'user_id', 'post_id', 'created_at']);
    }
}