<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\PostsServiceInterface;
use App\Http\Interfaces\CommentServiceInterface;
use App\Http\Interfaces\CategoryServiceInterface;
use App\Http\Requests\PostRequest;
use App\Http\Requests\SearchRequest;
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

    public function searchForPosts(SearchRequest $request)
    {
        $searchResults = $this->postsService->searchForPosts($request->validated());

        return view('posts.search', ['posts' => $searchResults]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allPosts = $this->postsService->getAllPosts();

        return view('posts.index', ['posts' => $allPosts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $allCategories = $this->categoryService->getAllCategories();

        return view('posts.create', ['categories' => $allCategories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        try 
        {
            $post = $this->postsService->createPost($request->validated());
            $post->categories()->attach($request->input('categories'));
            return redirect()->route('posts.index');
        } 
        catch (Exception $e) 
        {
            return back()->withErrors(['error' => 'Failed to publish, please try again.']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $singlePost = $this->postsService->getSinglePost($id);
        $postComments = $this->commentsService->getPostComments($id);
        $postCategories = $this->categoryService->getPostCategories($id);

        return view('posts.show', ['post' => $singlePost, 'comments' => $postComments, 'categories' => $postCategories]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $targetPost = $this->postsService->getSinglePost($id);
        $allCategories = $this->categoryService->getAllCategories();
        $postCategories = $this->categoryService->getPostCategories($id);

        return view('posts.edit', ['post' => $targetPost, 'categories' => $allCategories, 'activeCategories' => $postCategories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $id, PostRequest $request)
    {
        try 
        {
            $post = $this->postsService->editPost($id, $request->validated());
            $post->categories()->sync($request->input('categories'));
            return redirect()->route('posts.show', $id);
        } 
        catch (Exception $e) 
        {
            return back()->withErrors(['error' => 'Failed to publish, please try again.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->postsService->deletePost($id);
        
        return redirect()->route('posts.index');
    }
}
