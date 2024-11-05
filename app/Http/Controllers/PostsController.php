<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\PostsServiceInterface;
use App\Http\Interfaces\CommentServiceInterface;
use App\Http\Interfaces\CategoryServiceInterface;
use App\Http\Requests\PostRequest;
use Exception;

class PostsController
{
    protected $postsService;
    protected $commentsService;
    protected $categoryService;

    public function __construct(PostsServiceInterface $postsService, CommentServiceInterface $commentsService, CategoryServiceInterface $categoryService)
    {
        $this->postsService = $postsService;
        $this->commentsService = $commentsService;
        $this->categoryService = $categoryService;
    }

    public function showAllPostsPage()
    {
        $allPosts = $this->postsService->getAllPosts();

        return view('posts.index', ['posts' => $allPosts]);
    }

    public function showSinglePostPage($id)
    {
        $singlePost = $this->postsService->getSinglePost($id);
        $postComments = $this->commentsService->getPostComments($id);

        return view('posts.show', ['post' => $singlePost, 'comments' => $postComments]);
    }

    public function showCreatePostPage()
    {
        $allCategories = $this->categoryService->getAllCategories();

        return view('posts.create', ['categories' => $allCategories]);
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
