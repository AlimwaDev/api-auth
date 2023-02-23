<?php

namespace Alimwa\Auth\app\Domain;

class APIHelper
{
	public static function apiVersionPrefix(): string
	{
		$version = config('alimwa-api-auth.apiVersion') ?? null;
		$prefix = $version ? '/' . $version : '';
		return 'api' . $prefix .'/auth';
	}
}