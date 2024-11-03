<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Interfaces\RegisterServiceInterface;

class RegisterController
{
    protected $registerService;

    public function __construct(RegisterServiceInterface $registerService)
    {
        $this->registerService = $registerService;
    }

    public function showRegistrationPage()
    {
        return view('register');
    }

    public function registerUser(RegisterRequest $request)
    {
        try 
        {
            $this->registerService->createUser($request->validated());
            return redirect()->route('login.get');
        } 
        catch (\Exception $e) 
        {
            return back()->withErrors(['error' => 'Registration failed, please try again.']);
        }
    }
}