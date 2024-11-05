<?php

namespace App\Http\Services;

use App\Http\Interfaces\PostsServiceInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class PostsService implements PostsServiceInterface
{
    public function getAllPosts(): Collection
    {
        return Post::select('posts.*', 'users.id as author_id', 'users.full_name as author_name')
                    ->leftJoin('users', 'posts.author_id', '=', 'users.id')
                    ->get();
    }

    public function getSinglePost($id): Post
    {
        return Post::with('author')->find($id);
    }

    public function searchForPosts(array $data): Collection
    {
        $query = $data['query'];

        return Post::with('author')
                    ->where('title', 'LIKE', "%{$query}%")
                    ->orWhere('body', 'LIKE', "%{$query}%")
                    ->get();
    }

    public function createPost(array $data): Post
    {
        $data['author_id'] = Auth::id();
        
        return Post::create($data);
    }

    public function editPost($id, array $data): Post
    {
        $post = Post::findOrFail($id);

        $post->title = $data['title'];
        $post->body = $data['body'];

        $post->save();

        return $post;
    }

    public function deletePost($id): void
    {
        $post = Post::findOrFail($id);

        $post->delete();
    }
}