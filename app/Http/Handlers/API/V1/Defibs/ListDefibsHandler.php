<?php

declare(strict_types=1);

namespace App\Http\Handlers\API\V1\Defibs;

use App\Models\Defib;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use JustSteveKing\StatusCode\Http;
use App\Http\Resources\API\V1\DefibResource;

class ListDefibsHandler
{
    public function __invoke(Request $request): JsonResponse
    {
        $defibs = Defib::query()->public()->get();

        if (auth('sanctum')->check()) {
            $defibs = Defib::with('notes')->get();
        }

        return new JsonResponse(['data' => DefibResource::collection($defibs)], Http::OK);
    }
}
