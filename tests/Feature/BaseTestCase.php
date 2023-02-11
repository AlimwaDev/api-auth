<?php

namespace Alimwa\Auth\Tests\Feature;

use Alimwa\Auth\app\Models\User;
use Orchestra\Testbench\TestCase;
use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use Alimwa\Auth\Tests\Traits\HasAuthUser;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BaseTestCase extends TestCase
{
	use HasAuthUser;
	use RefreshDatabase;
    public function setUp(): void
    {
        parent::setUp();

		User::factory()->create();
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