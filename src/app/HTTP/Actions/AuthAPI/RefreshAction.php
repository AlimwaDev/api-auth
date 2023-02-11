<?php

namespace Alimwa\Auth\app\HTTP\Actions\AuthAPI;

use Alimwa\Auth\app\HTTP\Actions\BaseAPIAction;

class RefreshAction extends BaseAPIAction
{
    public function execute(): self
    {
        $user = request()->user();

        $user->currentAccessToken()->delete();

        $token =  $user->createToken(config('auth.tokens.name'));

        $this->result['data'] = [
            'token' => $token->plainTextToken,
			'user' => $user
        ];

        return $this;
    }
}