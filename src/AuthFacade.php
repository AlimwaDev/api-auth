<?php

namespace Alimwa\Auth;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Alimwa\Auth\Skeleton\SkeletonClass
 */
class AuthFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'alimwa_auth';
    }
}
