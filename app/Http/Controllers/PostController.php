<?php

namespace App\Http\Controllers;

use App\Http\Services\PostsService;
use App\Http\Services\CommentService;
use App\Http\Services\CategoryService;
use App\Http\Requests\PostRequest;
use App\Http\Requests\SearchRequest;
use Exception;

class PostController
{
    protected $postsService;
    protected $commentsService;
    protected $categoryService;

    public function __construct(PostsService $postsService, CommentService $commentsService, CategoryService $categoryService)
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

    public function index()
    {
        $allPosts = $this->postsService->getAllPosts();

        return view('posts.index', ['posts' => $allPosts]);
    }

    public function create()
    {
        $allCategories = $this->categoryService->getAllCategories();

        return view('posts.create', ['categories' => $allCategories]);
    }

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

    public function show(string $id)
    {
        $singlePost = $this->postsService->getPostById($id);
        $postComments = $this->commentsService->getCommentsByPostId($id);
        $postCategories = $this->categoryService->getCategoriesByPostId($id);

        return view('posts.show', ['post' => $singlePost, 'comments' => $postComments, 'categories' => $postCategories]);
    }

    public function edit(string $id)
    {
        $targetPost = $this->postsService->getPostById($id);
        $allCategories = $this->categoryService->getAllCategories();
        $postCategories = $this->categoryService->getCategoriesByPostId($id);

        return view('posts.edit', ['post' => $targetPost, 'categories' => $allCategories, 'activeCategories' => $postCategories]);
    }

    public function update(string $id, PostRequest $request)
    {
        try 
        {
            $post = $this->postsService->updatePost($id, $request->validated());
            $post->categories()->sync($request->input('categories'));
            return redirect()->route('posts.show', $id);
        } 
        catch (Exception $e) 
        {
            return back()->withErrors(['error' => 'Failed to publish, please try again.']);
        }
    }

    public function destroy(string $id)
    {
        $this->postsService->deletePost($id);
        
        return redirect()->route('posts.index');
    }
}
