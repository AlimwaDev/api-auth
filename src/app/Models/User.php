<?php

namespace Alimwa\Auth\app\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Alimwa\Auth\database\factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
	use HasApiTokens, HasFactory, Notifiable;

	/**
	 * Create a new factory instance for the model.
	 *
	 * @return Factory
	 */
	protected static function newFactory(): Factory
	{
		return new UserFactory();
	}
}