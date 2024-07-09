<?php

namespace App\Providers;

use App\Contracts\Models\UserCreateServiceInterface;
use App\Contracts\Models\UserServiceInterface;

use App\Services\Models\User\UserCreateService;
use App\Services\Models\User\UserService;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(UserServiceInterface::class, UserService::class);
        $this->app->bind(UserCreateServiceInterface::class, UserCreateService::class);
    }

    public function boot(): void
    {
        //
    }
}
