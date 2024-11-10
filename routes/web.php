<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsurePostOwnership;
use App\Http\Middleware\EnsureCommentOwnership;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

Route::get('/', function () { return view('welcome'); })->name('welcome');

Route::middleware(['guest'])->group(function () 
{
    Route::get('/register', [RegisterController::class, 'create'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);

    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store']);
});

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/search', [PostController::class, 'search'])->name('posts.search');

Route::middleware(['auth'])->group(function () 
{
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');

    Route::post('/logout', [LogoutController::class, 'destroy'])->name('logout');
});

Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

Route::middleware([EnsurePostOwnership::class])->group(function () 
{
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
});

Route::middleware([EnsureCommentOwnership::class])->group(function () 
{
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
});
