<?php

namespace Alimwa\Auth\Tests\Feature\API;

use Illuminate\Support\Str;
use Alimwa\Auth\Tests\Feature\BaseTestCase;
use Alimwa\Auth\app\Attributes\TestConfigurations\APIAuthTestConfiguration;

class AuthAPITest extends BaseTestCase
{
    /**
     * Test successful user log in given valid credentials.
     *
     * @return void
     */
    public function test_login_success()
    {
		$validCredentials = APIAuthTestConfiguration::validLoginCredentials();

		foreach ($validCredentials as $credential) {
			$response = $this->postJson(
				'/api/auth/login',
				$credential
			);

			$response->assertStatus(201);
		}
    }

    /**
     * Test unsuccessful user log in given invalid credentials.
     *
     * @return void
     */
    public function test_login_failure()
    {
		$invalidCredentials = APIAuthTestConfiguration::invalidLoginCredentials();

		foreach ($invalidCredentials as $credential) {
			$response = $this->postJson(
				'/api/auth/login',
				$credential
			);

			if ($credential['email'] === '') {
				$response->assertStatus(422);
			} else {
				$response->assertStatus(401);
			}
		}
    }

	/**
	 * Test successful user token refresh.
	 *
	 * @return void
	 */
	public function test_refresh_success()
	{
		$response = $this->withAuthUser()->getJson('/api/auth/refresh');

		$response->assertStatus(201);
	}

	/**
	 * Test unsuccessful user token refresh.
	 *
	 * @return void
	 */
	public function test_refresh_failure()
	{
		$response = $this->getJson('/api/auth/refresh');

		$response->assertStatus(401);

		$response = $this->withToken(Str::random(32))->getJson('/api/auth/refresh');

		$response->assertStatus(401);
	}

	/**
	 * Test successful user details retrieval.
	 *
	 * @return void
	 */
	public function test_get_user_success()
	{
		$response = $this->withAuthUser()->getJson('/api/auth/user');

		$response->assertStatus(201);
	}

	/**
	 * Test unsuccessful user details retrieval.
	 *
	 * @return void
	 */
	public function test_get_user_failure()
	{
		$response = $this->getJson('/api/auth/user');

		$response->assertStatus(401);

		$response = $this->withToken(Str::random(32))->getJson('/api/auth/user');

		$response->assertStatus(401);
	}

	/**
	 * Test successful user token refresh.
	 *
	 * @return void
	 */
	public function test_logout_success()
	{
		$response = $this->withAuthUser()->getJson('/api/auth/logout');

		$response->assertStatus(201);
	}

	/**
	 * Test unsuccessful user token refresh.
	 *
	 * @return void
	 */
	public function test_logout_failure()
	{
		$response = $this->getJson('/api/auth/logout');

		$response->assertStatus(401);

		$response = $this->withToken(Str::random(32))->getJson('/api/auth/logout');

		$response->assertStatus(401);
	}
}