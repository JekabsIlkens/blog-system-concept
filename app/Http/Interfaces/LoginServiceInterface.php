<?php

namespace App\Http\Interfaces;

interface LoginServiceInterface
{
    public function authenticateUser(array $data): void;
}
