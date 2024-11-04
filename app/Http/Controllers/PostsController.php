<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\PostsServiceInterface;

class PostsController
{
    protected $postsService;

    public function __construct(PostsServiceInterface $postsService)
    {
        $this->postsService = $postsService;
    }

    public function index()
    {
        $allPosts = $this->postsService->getAllPosts();

        return view('posts.index', ['posts' => $allPosts]);
    }
}
