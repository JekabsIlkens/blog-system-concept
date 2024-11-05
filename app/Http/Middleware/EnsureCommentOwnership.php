<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureCommentOwnership
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $commentId = $request->route('id');
        
        $comment = Comment::find($commentId);

        if ($comment->user_id !== Auth::id()) 
        {
            abort(403, 'Unauthorized access');
        }

        return $next($request);
    }
}
