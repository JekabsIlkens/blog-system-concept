<?php

namespace App\Http\Services;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginService
{
    public function authenticateUser(array $data): Authenticatable
    {
        if (!Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) 
        {
            throw ValidationException::withMessages(['incorrect-password' => ['Provided password is incorrect.']]);
        }
        
        return Auth::user();
    }
}