<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;

class RegisterController
{
    public function showRegistrationPage()
    {
        return view('register');
    }

    public function registerUser(RegisterRequest $request)
    {
        $validatedData = $request->validated();
    }
}