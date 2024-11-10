<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Services\RegisterService;
use Exception;

class RegisterController
{
    protected $registerService;

    public function __construct(RegisterService $registerService)
    {
        $this->registerService = $registerService;
    }

    public function create()
    {
        return view('auth.register');
    }

    public function store(RegisterRequest $request)
    {
        try 
        {
            $this->registerService->createUser($request->validated());
            return redirect()->route('login');
        } 
        catch (Exception $e) 
        {
            return back()->withErrors(['error' => 'Registration failed, please try again.']);
        }
    }
}
