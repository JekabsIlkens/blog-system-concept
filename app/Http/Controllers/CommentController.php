<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Services\CommentService;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\Post;

class CommentController
{
    protected $commentsService;

    public function __construct(CommentService $commentsService)
    {
        $this->commentsService = $commentsService;
    }

    public function store(Post $post, CommentRequest $request)
    {
        $data = $request->validated();

        $data['user_id'] = Auth::id();
        $post->comments()->create($data);

        return redirect()->route('posts.show', $post);
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        
        return redirect(url()->previous());
    }
}
