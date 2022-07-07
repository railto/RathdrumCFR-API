<?php

namespace App\Http\Handlers\API\V1;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class HealthCheck
{
    public function __invoke(Request $request): JsonResponse
    {
        return new JsonResponse(data: ['ping' => time()]);
    }
}
