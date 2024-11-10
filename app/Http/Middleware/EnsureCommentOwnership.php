<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureCommentOwnership
{
    public function handle(Request $request, Closure $next): Response
    {
        $comment = $request->route('comment');

        if ($comment->user_id !== Auth::id()) 
        {
            abort(403, 'Unauthorized access');
        }

        return $next($request);
    }
}
