<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Interfaces\LoginServiceInterface;
use Illuminate\Validation\ValidationException;

class LoginController
{
    protected $loginService;

    public function __construct(LoginServiceInterface $loginService)
    {
        $this->loginService = $loginService;
    }

    public function showLoginPage()
    {
        return view('auth.login');
    }

    public function loginUser(LoginRequest $request)
    {
        try 
        {
            $this->loginService->authenticateUser($request->validated());

            return redirect()->route('posts.index');
        } 
        catch (ValidationException $e) 
        {
            return redirect()->back()->withErrors($e->errors())->withInput($request->only('email'));
        }
    }
}
