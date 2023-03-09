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
    public function test_login_success(): void
    {
		$validCredentials = APIAuthTestConfiguration::validLoginCredentials();

		foreach ($validCredentials as $credential) {
			$response = $this->postJson(
				$this->getFullAPIEndpoint('/login'),
				$credential
			);

			$response->assertStatus(200);
		}
    }

    /**
     * Test unsuccessful user log in given invalid credentials.
     *
     * @return void
     */
    public function test_login_failure(): void
    {
		$invalidCredentials = APIAuthTestConfiguration::invalidLoginCredentials();

		foreach ($invalidCredentials as $credential) {
			$response = $this->postJson(
				$this->getFullAPIEndpoint('/login'),
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
	public function test_refresh_success(): void
	{
		$response = $this->withAuthUser()->getJson($this->getFullAPIEndpoint('/refresh'));

		$response->assertStatus(200);
	}

	/**
	 * Test unsuccessful user token refresh.
	 *
	 * @return void
	 */
	public function test_refresh_failure(): void
	{
		$response = $this->getJson($this->getFullAPIEndpoint('/refresh'));

		$response->assertStatus(401);

		$response = $this->withToken(Str::random(32))->getJson($this->getFullAPIEndpoint('/refresh'));

		$response->assertStatus(401);
	}

	/**
	 * Test successful user details retrieval.
	 *
	 * @return void
	 */
	public function test_get_user_success(): void
	{
		$response = $this->withAuthUser()->getJson($this->getFullAPIEndpoint('/user'));

		$response->assertStatus(200);
	}

	/**
	 * Test unsuccessful user details retrieval.
	 *
	 * @return void
	 */
	public function test_get_user_failure(): void
	{
		$response = $this->getJson($this->getFullAPIEndpoint('/user'));

		$response->assertStatus(401);

		$response = $this->withToken(Str::random(32))->getJson($this->getFullAPIEndpoint('/user'));

		$response->assertStatus(401);
	}

	/**
	 * Test successful user token refresh.
	 *
	 * @return void
	 */
	public function test_logout_success(): void
	{
		$response = $this->withAuthUser()->getJson($this->getFullAPIEndpoint('/logout'));

		$response->assertStatus(200);
	}

	/**
	 * Test unsuccessful user token refresh.
	 *
	 * @return void
	 */
	public function test_logout_failure(): void
	{
		$response = $this->getJson($this->getFullAPIEndpoint('/logout'));

		$response->assertStatus(401);

		$response = $this->withToken(Str::random(32))->getJson($this->getFullAPIEndpoint('/logout'));

		$response->assertStatus(401);
	}
}