<?php

namespace Alimwa\Auth\app\HTTP\Actions;

use Illuminate\Http\JsonResponse;

abstract class BaseAPIAction
{
    /**
     * @var array $result
     */
    protected array $result = [
        'data' => [],
        'message' => null,
        'errors' => []
    ];

    /**
     * @var int $code
     */
    protected int $code = 201;

    /**
     * Returns the response from executing the action
     *
     * @return JsonResponse
     */
    public function getResponse(): JsonResponse
    {
        return response()->json($this->result, $this->code);
    }
}
