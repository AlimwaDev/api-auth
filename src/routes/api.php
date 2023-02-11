<?php

use Illuminate\Support\Facades\Route;
use Alimwa\Auth\app\HTTP\Controllers\API\AuthAPIController;

Route::prefix('api/auth')->as('auth.')->controller(AuthAPIController::class)->group(function () {
    Route::post('login', 'login')->name('login');

	Route::middleware('auth:sanctum')->group(function () {
		Route::get('logout', 'logout')->name('logout');

		Route::get('refresh', 'refresh')->name('refresh');

		Route::get('user', 'user')->name('user');
	});
});