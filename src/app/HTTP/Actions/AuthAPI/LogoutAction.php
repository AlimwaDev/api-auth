<?php

namespace Alimwa\Auth\app\HTTP\Actions\AuthAPI;

use Alimwa\Auth\app\HTTP\Actions\BaseAPIAction;

class LogoutAction extends BaseAPIAction
{
    public function execute(): self
    {
        request()->user()->currentAccessToken()->delete();
        return $this;
    }
}