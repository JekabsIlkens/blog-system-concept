<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginService
{
    public function authenticateUser(array $data): void
    {
        if (!Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) 
        {
            throw ValidationException::withMessages(['error' => ['Provided password is incorrect.']]);
        }
        
        Auth::user();
    }
}
