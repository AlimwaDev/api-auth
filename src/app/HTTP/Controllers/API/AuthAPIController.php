<?php

namespace Alimwa\Auth\app\HTTP\Controllers\API;

use Illuminate\Http\JsonResponse;
use Alimwa\Auth\app\HTTP\Actions\AuthAPI\UserAction;
use Alimwa\Auth\app\HTTP\Requests\Auth\LoginRequest;
use Alimwa\Auth\app\HTTP\Actions\AuthAPI\LoginAction;
use Alimwa\Auth\app\HTTP\Controllers\Controller;
use Alimwa\Auth\app\HTTP\Actions\AuthAPI\LogoutAction;
use Alimwa\Auth\app\HTTP\Actions\AuthAPI\RefreshAction;

class AuthAPIController extends Controller
{
    public function login(LoginAction $loginAction, LoginRequest $request): JsonResponse
    {
        return $loginAction->execute($request)
            ->getResponse();
    }

    public function logout(LogoutAction $logoutAction): JsonResponse
    {
        return $logoutAction->execute()
            ->getResponse();
    }

    public function refresh(RefreshAction $refreshAction): JsonResponse
    {
        return $refreshAction->execute()
            ->getResponse();
    }

    public function user(UserAction $userAction): JsonResponse
    {
        return $userAction->execute()
            ->getResponse();
    }
}