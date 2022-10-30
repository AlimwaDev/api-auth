<?php

use Illuminate\Support\Facades\Route;
use Alimwa\Auth\app\HTTP\Controllers\API\AuthAPIController;

Route::prefix('auth')->as('auth.')->controller(AuthAPIController::class)->group(function () {

});