<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\PostsServiceInterface;
use App\Http\Requests\PostRequest;

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

    public function show($id)
    {
        $singlePost = $this->postsService->getSinglePost($id);

        return view('posts.show', ['post' => $singlePost]);
    }

    public function viewCreatePage()
    {
        return view('posts.create');
    }

    public function create(PostRequest $request)
    {
        try 
        {
            $this->postsService->createPost($request->validated());
            return redirect()->route('posts.index.get');
        } 
        catch (\Exception $e) 
        {
            return back()->withErrors(['error' => 'Failed to publish, please try again.']);
        }
    }

    public function viewEditPage($id)
    {
        $targetPost = $this->postsService->getSinglePost($id);

        return view('posts.edit', ['post' => $targetPost]);
    }

    public function edit($id, PostRequest $request)
    {
        try 
        {
            $this->postsService->editPost($id, $request->validated());
            return redirect()->route('posts.index.get');
        } 
        catch (\Exception $e) 
        {
            return back()->withErrors(['error' => 'Failed to publish, please try again.']);
        }
    }
}
