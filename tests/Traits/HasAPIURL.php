<?php

namespace Alimwa\Auth\Tests\Traits;

use Alimwa\Auth\app\Domain\APIHelper;

trait HasAPIURL
{
	/**
	 * @param string $path
	 * @return string
	 */
	public function getFullAPIEndpoint(string $path): string
	{
		return APIHelper::apiVersionPrefix() . $path;
	}
}