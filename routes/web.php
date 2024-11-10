<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsurePostOwnership;
use App\Http\Middleware\EnsureCommentOwnership;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CommentController;

Route::get('/', function () { return view('welcome'); })->name('welcome');

Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::get('/posts', [PostsController::class, 'index'])->name('posts.index');


Route::get('/posts/search', [PostsController::class, 'searchForPosts'])->name('posts.search');


Route::middleware(['auth'])->group(function () 
{
    Route::get('/posts/create', [PostsController::class, 'create'])->name('posts.create');

    Route::post('/posts', [PostsController::class, 'store'])->name('posts.store');

    Route::post('/posts/{id}/comment', [CommentController::class, 'createComment'])->name('posts.comment.post');

    Route::post('/logout', [LogoutController::class, 'destroy'])->name('logout');
});

Route::get('/posts/{id}', [PostsController::class, 'show'])->name('posts.show');

Route::middleware([EnsurePostOwnership::class])->group(function () 
{
    Route::get('/posts/{id}/edit', [PostsController::class, 'edit'])->name('posts.edit');

    Route::put('/posts/{id}', [PostsController::class, 'update'])->name('posts.update');

    Route::delete('/posts/{id}', [PostsController::class, 'destroy'])->name('posts.destroy');
});

Route::middleware([EnsureCommentOwnership::class])->group(function () 
{
    Route::delete('/posts/comment/{id}/delete', [CommentController::class, 'deleteComment'])->name('posts.comment.delete');
});
