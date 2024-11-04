<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsurePostOwnership;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostsController;

Route::get('/', function () { return view('welcome'); })->name('welcome.get');

Route::get('/register', [RegisterController::class, 'showRegistrationPage'])->name('register.get');
Route::post('/register', [RegisterController::class, 'registerUser'])->name('register.post');

Route::get('/login', [LoginController::class, 'showLoginPage'])->name('login');
Route::post('/login', [LoginController::class, 'loginUser'])->name('login.post');

Route::get('/posts', [PostsController::class, 'index'])->name('posts.index.get');

Route::middleware(['auth'])->group(function () {

    Route::post('/logout', function () { Auth::logout(); return redirect('/'); })->name('logout.post');

    Route::get('posts/new', [PostsController::class, 'viewCreatePage'])->name('posts.create.get');
    Route::post('posts/new', [PostsController::class, 'create'])->name('posts.create.post');
});

Route::get('/posts/{id}', [PostsController::class, 'show'])->name('posts.show.get');

Route::middleware([EnsurePostOwnership::class])->group(function () {

    Route::get('/posts/{id}/edit', [PostsController::class, 'viewEditPage'])->name('posts.edit.get');
    Route::post('/posts/{id}/edit', [PostsController::class, 'edit'])->name('posts.edit.post');

    Route::post('/posts/{id}/delete', [PostsController::class, 'delete'])->name('posts.delete.post');
});