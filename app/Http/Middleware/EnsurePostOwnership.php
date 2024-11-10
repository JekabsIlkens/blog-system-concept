<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsurePostOwnership
{
    public function handle(Request $request, Closure $next): Response
    {
        $postId = $request->route('id');
        
        $post = Post::find($postId);

        if ($post->author_id !== Auth::id()) 
        {
            abort(403, 'Unauthorized access');
        }

        return $next($request);
    }
}
