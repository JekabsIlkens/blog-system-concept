<?php

namespace App\Http\Interfaces;

interface RegisterServiceInterface
{
    public function createUser(array $data): void;
}