<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsurePostOwnership;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CommentController;

Route::get('/', function () { return view('welcome'); })->name('welcome');

Route::get('/register', [RegisterController::class, 'showRegistrationPage'])->name('register');
Route::post('/register', [RegisterController::class, 'registerUser'])->name('register.post');

Route::get('/login', [LoginController::class, 'showLoginPage'])->name('login');
Route::post('/login', [LoginController::class, 'loginUser'])->name('login.post');

Route::get('/posts', [PostsController::class, 'showAllPostsPage'])->name('posts.index');

Route::middleware(['auth'])->group(function () {

    Route::post('/logout', [LogoutController::class, 'logoutUser'])->name('logout.post');
    Route::get('posts/create', [PostsController::class, 'showCreatePostPage'])->name('posts.create');
    Route::post('posts/create', [PostsController::class, 'createPost'])->name('posts.create.post');
    Route::post('/posts/{id}/comment', [CommentController::class, 'createComment'])->name('posts.comment.post');
});

Route::get('/posts/{id}', [PostsController::class, 'showSinglePostPage'])->name('posts.show');

Route::middleware([EnsurePostOwnership::class])->group(function () {

    Route::get('/posts/{id}/edit', [PostsController::class, 'showEditPostPage'])->name('posts.edit');
    Route::put('/posts/{id}/edit', [PostsController::class, 'editPost'])->name('posts.edit.put');
    Route::delete('/posts/{id}/delete', [PostsController::class, 'deletePost'])->name('posts.delete');
});