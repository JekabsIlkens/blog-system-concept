<?php

namespace App\Http\Services;

use App\Http\Interfaces\LoginServiceInterface;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginService implements LoginServiceInterface
{
    public function authenticateUser(array $data): Authenticatable
    {
        if (!Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) 
        {
            throw ValidationException::withMessages(['error' => ['Provided password is incorrect.']]);
        }
        
        return Auth::user();
    }
}