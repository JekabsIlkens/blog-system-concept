<?php

namespace App\Http\Services;

use App\Http\Interfaces\RegisterServiceInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterService implements RegisterServiceInterface
{
    public function createUser(array $data): User
    {
        return User::create([
            'full_name' => $data['full_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }
}