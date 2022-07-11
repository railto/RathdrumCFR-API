<?php

declare(strict_types=1);

namespace App\Http\Handlers\API\V1\Defibs;

use App\Models\Defib;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use JustSteveKing\StatusCode\Http;
use App\Http\Resources\API\V1\DefibResource;

class ShowDefibHandler
{
    public function __invoke(Request $request, string $uuid): JsonResponse
    {
        $defib = Defib::query()->with('notes')->where('uuid', $uuid)->first();

        if (!$defib) {
            return new JsonResponse([], Http::NOT_FOUND);
        }

        return new JsonResponse(['data' => DefibResource::make($defib)], Http::OK);
    }
}
