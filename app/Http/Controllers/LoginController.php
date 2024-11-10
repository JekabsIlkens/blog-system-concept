<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Services\LoginService;
use Illuminate\Validation\ValidationException;

class LoginController
{
    protected $loginService;

    public function __construct(LoginService $loginService)
    {
        $this->loginService = $loginService;
    }

    public function create()
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request)
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
