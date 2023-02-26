<?php

namespace Alimwa\Auth\app\HTTP\Actions\AuthAPI;

use Illuminate\Support\Facades\App;
use Alimwa\Auth\app\HTTP\Actions\BaseAPIAction;

class UserAction extends BaseAPIAction
{
    public function execute(): self
    {
        $userModel = App::make(config('alimwa-api-auth.model'));

        $this->result['data'] = [
            'user' => $userModel::find(request()->user()->getAuthIdentifier())->toArray(),
        ];
        return $this;
    }
}
