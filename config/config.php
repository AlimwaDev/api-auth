<?php

/*
 * Auth Config
 */

use Alimwa\Auth\app\Models\User;

return [
	'tokens' => [
		'name' => 'API_AUTH_TOKEN',
	],
	'model' => User::class,
	'apiVersion' => 'v1',
];