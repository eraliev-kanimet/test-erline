<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Models\UserCreateServiceInterface;
use App\Contracts\Models\UserServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\LoginRequest;
use App\Http\Requests\Api\Auth\RegisterRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(RegisterRequest $request, UserCreateServiceInterface $service)
    {
        $userService = $service->create($request->validated());

        $userService->login();

        return $this->apiRes($userService->resourceWithToken());
    }

    public function login(LoginRequest $request, UserServiceInterface $service)
    {
        if ($service->attempt($request->validated())) {
            return $this->apiRes($service->resourceWithToken());
        }

        return $this->apiRes(['message' => 'Incorrect accounting data'], 401);
    }

    public function show(UserServiceInterface $service)
    {
        return $service->set(Auth::user())->resource();
    }

    public function logout(UserServiceInterface $service)
    {
        $service->set(Auth::user())->apiLogout();

        return $this->apiRes();
    }
}
