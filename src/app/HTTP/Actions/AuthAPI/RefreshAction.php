<?php

namespace Alimwa\Auth\app\HTTP\Actions\AuthAPI;

use Illuminate\Support\Facades\App;
use Alimwa\Auth\app\HTTP\Actions\BaseAPIAction;

class RefreshAction extends BaseAPIAction
{
    public function execute(): self
    {
        $userModel = App::make(config('alimwa-api-auth.model'));

        $user = request()->user();

        $user->currentAccessToken()->delete(); // @phpstan-ignore-line

        $token = $user->createToken(config('alimwa-api-auth.tokens.name')); // @phpstan-ignore-line

        $this->result['data'] = [
            'token' => $token->plainTextToken,
            'user' => $userModel::find(request()->user()->getAuthIdentifier())->toArray(),
        ];

        return $this;
    }
}
