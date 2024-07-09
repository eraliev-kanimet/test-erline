<?php

namespace App\Contracts\Models;

interface UserCreateServiceInterface
{
    public function create(array $data): UserServiceInterface;
}
