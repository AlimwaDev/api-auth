<?php

namespace Alimwa\Auth\app\HTTP\Actions\AuthAPI;

use Alimwa\Auth\app\HTTP\Actions\BaseAPIAction;

class LogoutAction extends BaseAPIAction
{
    public function execute(): self
    {
        request()->user()->currentAccessToken()->delete(); // @phpstan-ignore-line

        $this->result['message'] = 'User Logged Out Successfully';

        return $this;
    }
}
