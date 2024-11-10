<?php

namespace App\Http\Services;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;

class CommentService
{
    public function getPostComments($id): Collection
    {
        return Comment::where('post_id', $id)
            ->with('user:id,full_name')
            ->get(['id', 'comment', 'user_id', 'post_id', 'created_at']);
    }

    public function createComment($id, array $data): void
    {
        $data['post_id'] = $id;
        $data['user_id'] = Auth::id();
        
        Comment::create($data);
    }

    public function deleteComment($id): void
    {
        $comment = Comment::findOrFail($id);

        $comment->delete();
    }
}
