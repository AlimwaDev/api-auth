<?php

namespace Alimwa\Auth\app\HTTP\Actions\AuthAPI;

use Alimwa\Auth\app\HTTP\Actions\BaseAPIAction;

class UserAction extends BaseAPIAction
{
    public function execute(): self
    {
		$this->result['data'] = [
			'user' => request()->user(),
		];
        return $this;
    }
}