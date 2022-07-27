<?php

declare(strict_types=1);

namespace App\Http\Handlers\API\Defibs\Notes;

use App\Models\Defib;
use Illuminate\Http\JsonResponse;
use JustSteveKing\StatusCode\Http;
use App\Http\Resources\API\V1\DefibResource;
use App\Http\Requests\API\Defibs\StoreDefibNoteRequest;

class StoreDefibNoteHandler
{
    public function __invoke(StoreDefibNoteRequest $request, string $uuid): JsonResponse
    {
        $defib = Defib::query()->with(['notes', 'inspections'])->where('uuid', $uuid)->first();

        if (!$defib) {
            return new JsonResponse([], Http::NOT_FOUND);
        }

        $data = [
            'note' => $request->get('note'),
        ];

        $defib->notes()->create($data);

        return new JsonResponse(['data' => DefibResource::make($defib->fresh())], Http::CREATED);
    }
}
