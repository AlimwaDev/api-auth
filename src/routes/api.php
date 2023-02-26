<?php

use Alimwa\Auth\app\Domain\APIHelper;
use Illuminate\Support\Facades\Route;
use Alimwa\Auth\app\HTTP\Controllers\API\AuthAPIController;

Route::prefix(APIHelper::apiVersionPrefix())->as('auth.')->controller(AuthAPIController::class)->group(
    static function (): void {
        Route::post('login', 'login')->name('login');

        Route::middleware('auth:sanctum')->group(static function (): void {
            Route::get('logout', 'logout')->name('logout');

            Route::get('refresh', 'refresh')->name('refresh');

            Route::get('user', 'user')->name('user');
        });
    }
);
