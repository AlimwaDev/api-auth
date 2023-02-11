<?php

namespace Alimwa\Auth\Tests\Traits;

use Laravel\Sanctum\Sanctum;
use Alimwa\Auth\app\Models\User;
use Alimwa\Auth\Tests\Feature\BaseTestCase;

trait HasAuthUser
{
	/**
	 * @desc Ensures that test requests are made with an already authenticated user.
	 * @return BaseTestCase|HasAuthUser
	 */
	public function withAuthUser(): self
	{
		Sanctum::actingAs(
			User::first(),
			['*']
		);
		return $this;
	}
}