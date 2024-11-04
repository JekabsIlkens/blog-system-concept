<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\PostsServiceInterface;
use App\Http\Requests\PostRequest;
use Exception;

class PostsController
{
    protected $postsService;

    public function __construct(PostsServiceInterface $postsService)
    {
        $this->postsService = $postsService;
    }

    public function showAllPostsPage()
    {
        $allPosts = $this->postsService->getAllPosts();

        return view('posts.index', ['posts' => $allPosts]);
    }

    public function showSinglePostPage($id)
    {
        $singlePost = $this->postsService->getSinglePost($id);

        return view('posts.show', ['post' => $singlePost]);
    }

    public function showCreatePostPage()
    {
        return view('posts.create');
    }

    public function createPost(PostRequest $request)
    {
        try 
        {
            $this->postsService->createPost($request->validated());
            return redirect()->route('posts.index');
        } 
        catch (Exception $e) 
        {
            return back()->withErrors(['error' => 'Failed to publish, please try again.']);
        }
    }

    public function showEditPostPage($id)
    {
        $targetPost = $this->postsService->getSinglePost($id);

        return view('posts.edit', ['post' => $targetPost]);
    }

    public function editPost($id, PostRequest $request)
    {
        try 
        {
            $this->postsService->editPost($id, $request->validated());
            return redirect()->route('posts.index');
        } 
        catch (Exception $e) 
        {
            return back()->withErrors(['error' => 'Failed to publish, please try again.']);
        }
    }

    public function deletePost($id)
    {
        $this->postsService->deletePost($id);
        
        return redirect()->route('posts.index');
    }
}
