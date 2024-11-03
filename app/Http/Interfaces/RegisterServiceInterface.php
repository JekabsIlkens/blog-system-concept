<?php

namespace App\Http\Interfaces;

use App\Models\User;

interface RegisterServiceInterface
{
    public function createUser(array $data): User;
}