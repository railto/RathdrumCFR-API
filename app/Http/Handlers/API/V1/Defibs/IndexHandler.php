<?php

namespace App\Http\Handlers\API\V1\Defibs;

use App\Models\Defib;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use JustSteveKing\StatusCode\Http;
use App\Http\Resources\API\V1\DefibResource;

class IndexHandler
{
    public function __invoke(Request $request): JsonResponse
    {
        $defibs = Defib::query()->public()->get();

        if (auth('sanctum')->check()) {
            $defibs = Defib::all();
        }

        return new JsonResponse(data: DefibResource::collection(resource: $defibs), status: Http::OK);
    }
}
