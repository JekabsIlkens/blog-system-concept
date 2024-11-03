<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Services\RegisterService;

class RegisterController
{
    protected $registerService;

    public function __construct(RegisterService $registerService)
    {
        $this->registerService = $registerService;
    }

    public function showRegistrationPage()
    {
        return view('register');
    }

    public function registerUser(RegisterRequest $request)
    {
        $this->registerService->createUser($request->validated());

        return redirect('login');
    }
}