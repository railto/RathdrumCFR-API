<?php

namespace App\Http\Handlers\API\V1\Defibs;

use App\Models\Defib;
use Illuminate\Http\JsonResponse;
use JustSteveKing\StatusCode\Http;
use App\Http\Resources\API\V1\DefibResource;
use App\Http\Requests\API\V1\StoreDefibRequest;

class StoreDefibHandler
{
    public function __invoke(StoreDefibRequest $request): JsonResponse
    {
        $defib = Defib::create($request->validated());

        return new JsonResponse(['data' => DefibResource::make($defib)], Http::CREATED);
    }
}