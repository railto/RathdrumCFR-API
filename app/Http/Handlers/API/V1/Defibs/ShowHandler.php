<?php

namespace App\Http\Handlers\API\V1\Defibs;

use App\Models\Defib;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use JustSteveKing\StatusCode\Http;
use App\Http\Resources\API\V1\DefibResource;

class ShowHandler
{
    public function __invoke(Request $request, Defib $defib): JsonResponse
    {
        return new JsonResponse(['data' => new DefibResource($defib)], Http::OK);
    }
}
