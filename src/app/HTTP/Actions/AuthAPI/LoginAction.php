<?php

namespace Alimwa\Auth\app\HTTP\Actions\AuthAPI;

use Alimwa\Auth\app\Models\User;
use Alimwa\Auth\app\HTTP\Actions\BaseAPIAction;
use Illuminate\Support\Facades\Auth as LaravelAuth;
use Alimwa\Auth\app\HTTP\Requests\Auth\LoginRequest;

class LoginAction extends BaseAPIAction
{
    public function execute(LoginRequest $request): self
    {
        $credentials = $request->validated();

        if(LaravelAuth::attempt($credentials)) {
			$user = User::find(request()->user()->getAuthIdentifier());

			$user->tokens()->delete();

			$token = $user->createToken(config('auth.tokens.name'));

            $this->result['data'] = [
                'token' => $token->plainTextToken,
				'user' => $request->user(),
            ];
        } else  {
            $this->result['message'] = 'Invalid Credentials';

            $this->code = 401;
        }

        return $this;
    }
}