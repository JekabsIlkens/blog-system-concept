<?php

namespace App\Http\Interfaces;

use Illuminate\Contracts\Auth\Authenticatable;

interface LoginServiceInterface
{
    public function authenticateUser(array $data): Authenticatable;
}
