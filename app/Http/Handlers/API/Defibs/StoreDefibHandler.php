<?php

declare(strict_types=1);

namespace App\Http\Handlers\API\Defibs;

use App\Models\Defib;
use Illuminate\Http\JsonResponse;
use JustSteveKing\StatusCode\Http;
use App\Http\Resources\API\V1\DefibResource;
use App\Http\Requests\API\Defibs\StoreDefibRequest;

class StoreDefibHandler
{
    public function __invoke(StoreDefibRequest $request): JsonResponse
    {
        $defib = Defib::create($request->validated());

        return new JsonResponse(['data' => DefibResource::make($defib)], Http::CREATED);
    }
}
