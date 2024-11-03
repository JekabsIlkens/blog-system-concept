<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;

class RegisterUserController
{
    public function index()
    {
        return view('register');
    }

    public function register(RegisterUserRequest $request)
    {
        var_dump($request['full-name']);
        var_dump($request['email']);
        var_dump($request['password']);
    }
}