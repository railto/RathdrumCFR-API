<?php

namespace App\Http\Handlers\API\V1\Defibs\Notes;

use App\Models\Defib;
use Illuminate\Http\JsonResponse;
use JustSteveKing\StatusCode\Http;
use App\Http\Resources\API\V1\DefibResource;
use App\Http\Requests\API\V1\StoreDefibNoteRequest;

class StoreHandler
{
    public function __invoke(StoreDefibNoteRequest $request, Defib $defib): JsonResponse
    {
        $defib->notes()->create($request->validated());

        return new JsonResponse(['data' => new DefibResource($defib)], Http::CREATED);
    }
}
