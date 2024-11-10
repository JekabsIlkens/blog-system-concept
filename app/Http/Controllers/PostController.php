<?php

namespace App\Http\Controllers;

use App\Http\Services\PostsService;
use App\Http\Services\CommentService;
use App\Http\Services\CategoryService;
use App\Http\Requests\PostRequest;
use App\Http\Requests\SearchRequest;
use App\Models\Post;
use App\Models\Category;

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
        $post = $this->postsService->createPost($request->validated());
        $post->categories()->attach($request->input('categories'));

        return redirect()->route('posts.index');
    }

    public function show(Post $post)
    {
        $post->load('comments', 'categories');

        return view('posts.show', [
            'post' => $post,
            'comments' => $post->comments, 
            'categories' => $post->categories
        ]);
    }

    public function edit(Post $post)
    {
        $allCategories = Category::all();
        $postCategories = $post->categories;

        return view('posts.edit', [
            'post' => $post,
            'categories' => $allCategories,
            'activeCategories' => $postCategories
        ]);
    }

    public function update(Post $post, PostRequest $request)
    {
        $post->update($request->validated());
        $post->categories()->sync($request->input('categories'));

        return redirect()->route('posts.show', $post);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        
        return redirect()->route('posts.index');
    }
}
