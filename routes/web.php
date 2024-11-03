<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;

Route::get('/', function () { return view('welcome'); });

Route::get('/register', [RegisterController::class, 'showRegistrationPage']);
Route::post('/register', [RegisterController::class, 'registerUser']);

Route::get('/login', [LoginController::class, 'showLoginPage']);
Route::post('/login', [LoginController::class, 'loginUser']);
