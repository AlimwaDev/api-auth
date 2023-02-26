<?php

namespace Alimwa\Auth\app\Attributes\TestConfigurations;

use Illuminate\Support\Str;
use Alimwa\Auth\app\Models\User;

class APIAuthTestConfiguration
{
    /**
     * @return array
     */
    public static function validLoginCredentials(): array
    {
        return [
            [
                'email' => User::first()->email, // @phpstan-ignore-line
                'password' => 'password',
            ],
        ];
    }

    /**
     * @return array
     */
    public static function invalidLoginCredentials(): array
    {
        return [
            [
                'email' => User::first()->email, // @phpstan-ignore-line
                'password' => Str::random(8),
            ],
            [
                'email' => '',
                'password' => '',
            ],
        ];
    }
}
