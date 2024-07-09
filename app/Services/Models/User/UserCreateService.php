<?php

namespace App\Services\Models\User;

use App\Contracts\Models\UserCreateServiceInterface;
use App\Contracts\Models\UserServiceInterface;
use App\Models\User;

class UserCreateService implements UserCreateServiceInterface
{
    public function create(array $data): UserServiceInterface
    {
        $user = User::create($data);

        return new UserService($user);
    }
}
