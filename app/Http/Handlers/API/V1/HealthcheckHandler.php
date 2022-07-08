<?php

declare(strict_types=1);

namespace App\Http\Handlers\API\V1;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class HealthcheckHandler
{
    public function __invoke(Request $request): JsonResponse
    {
        return new JsonResponse(['ping' => time()]);
    }
}
