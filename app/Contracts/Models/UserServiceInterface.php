<?php

namespace App\Contracts\Models;

use App\Http\Resources\UserResource;
use App\Models\User;

interface UserServiceInterface
{
    public function set(User $record): static;

    public function login(): static;

    public function attempt(array $credentials): static|false;

    public function logout(): void;

    public function apiLogout(): void;

    public function resource(): UserResource;

    public function resourceWithToken(): array;
}
