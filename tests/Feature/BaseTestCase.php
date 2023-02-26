<?php

namespace Alimwa\Auth\Tests\Feature;

use Orchestra\Testbench\TestCase;
use Illuminate\Support\Facades\App;
use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use Alimwa\Auth\Tests\Traits\HasAPIURL;
use Alimwa\Auth\Tests\Traits\HasAuthUser;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BaseTestCase extends TestCase
{
	use HasAPIURL;
	use HasAuthUser;
	use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

		$userModel = App::make(config('alimwa-api-auth.model'));

		$userModel::factory()->create();
    }

	/**
	 * Define database migrations.
	 *
	 * @return void
	 */
	protected function defineDatabaseMigrations()
	{
		parent::defineDatabaseMigrations();

		$this->loadLaravelMigrations();

		$this->artisan('migrate', [
			'--database' => 'testing',
			'--realpath' => realpath(__DIR__ . '/../../vendor/laravel/sanctum/database/migrations'),
		]);
	}

	/**
	 * Get package providers.
	 *
	 * @param  Application  $app
	 *
	 * @return array<int, class-string<ServiceProvider>>
	 */
	protected function getPackageProviders($app): array
	{
		return [
			'Alimwa\Auth\AuthServiceProvider',
			'Laravel\Sanctum\SanctumServiceProvider',
		];
	}
}