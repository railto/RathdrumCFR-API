<?php

declare(strict_types=1);

namespace App\Http\Handlers\API\V1\Defibs;

use App\Models\Defib;
use Illuminate\Http\JsonResponse;
use JustSteveKing\StatusCode\Http;
use App\Http\Resources\API\V1\DefibResource;
use App\Http\Requests\API\V1\UpdateDefibRequest;

class UpdateDefibHandler
{
    public function __invoke(UpdateDefibRequest $request, string $uuid): JsonResponse
    {
        $defib = Defib::query()->with(['notes', 'inspections'])->where('uuid', $uuid)->first();

        if (!$defib) {
            return new JsonResponse([], Http::NOT_FOUND);
        }

        $defib->update($request->validated());

        return new JsonResponse(['data' => DefibResource::make($defib)], Http::ACCEPTED);
    }
}
