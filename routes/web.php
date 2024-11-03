<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;

Route::get('/', function () { return view('welcome'); });

Route::get('/register', [RegisterController::class, 'showRegistrationPage']);
Route::post('/register', [RegisterController::class, 'registerUser']);

Route::get('/login', function () { return view('login'); });
