<?php

namespace App\Services\Models\User;

use App\Contracts\Models\UserServiceInterface;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserService implements UserServiceInterface
{
    public function __construct(
        protected ?User $record = null
    )
    {
    }

    public function set(User $record): static
    {
        $this->record = $record;

        return $this;
    }

    public function login(): static
    {
        Auth::login($this->record);

        return $this;
    }

    public function attempt(array $credentials): static|false
    {
        if (Auth::attempt($credentials)) {
            return $this->set(Auth::user());
        }

        return false;
    }

    public function resource(): UserResource
    {
        return new UserResource($this->record);
    }

    public function resourceWithToken(): array
    {
        return [
            'data' => $this->resource(),
            'token' => $this->record->createToken(config('app.name'))->plainTextToken,
        ];
    }

    public function logout(): void
    {
//        request()->session()->invalidate();
//        request()->session()->regenerateToken();
    }

    public function apiLogout(): void
    {
        $this->record->tokens()->delete();

        $this->logout();
    }
}
