<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Http\Requests\SearchRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Category;

class PostController
{
    public function index()
    {
        $allPosts = Post::with('author')
            ->orderBy('created_at', 'desc')
            ->paginate(6);

        return view('posts.index', ['posts' => $allPosts]);
    }

    public function create()
    {
        $allCategories = Category::all();

        return view('posts.create', ['categories' => $allCategories]);
    }

    public function store(PostRequest $request)
    {
        $data = $request->validated();
        $data['author_id'] = Auth::id();

        $post = Post::create($data);
        $post->categories()->sync($request->input('categories'));

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

    public function search(SearchRequest $request)
    {
        $query = $request->validated()['query'];

        $searchResults = Post::with('author')
            ->whereRaw('LOWER(title) LIKE ?', ['%' . strtolower($query) . '%'])
            ->orWhereRaw('LOWER(body) LIKE ?', ['%' . strtolower($query) . '%'])
            ->orderBy('created_at', 'desc')
            ->paginate(6);

        return view('posts.search', ['posts' => $searchResults]);
    }
}
