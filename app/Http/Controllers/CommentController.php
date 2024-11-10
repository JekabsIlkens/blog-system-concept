<?php

namespace App\Http\Controllers;

use App\Http\Services\CommentService;
use App\Http\Requests\CommentRequest;
use Exception;

class CommentController
{
    protected $commentsService;

    public function __construct(CommentService $commentsService)
    {
        $this->commentsService = $commentsService;
    }

    public function store(string $id, CommentRequest $request)
    {
        try 
        {
            $this->commentsService->createComment($id, $request->validated());
            return redirect()->route('posts.show', ['id' => $id]);
        } 
        catch (Exception $e) 
        {
            return back()->withErrors(['error' => 'Failed to publish, please try again.']);
        }
    }

    public function destroy(string $id)
    {
        $this->commentsService->deleteComment($id);
        
        return redirect(url()->previous());
    }
}
