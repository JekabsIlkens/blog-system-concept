<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;

class LoginController
{
    public function showLoginPage()
    {
        return view('login');
    }

    public function loginUser(LoginRequest $request)
    {
        var_dump($request->validated());
    }
}
