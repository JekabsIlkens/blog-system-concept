<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterUserController;

Route::get('/', function () { return view('welcome'); });

Route::get('/register', [RegisterUserController::class, 'index']);
Route::post('/register', [RegisterUserController::class, 'register']);

Route::get('/login', function () { return view('login'); });
