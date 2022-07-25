<?php

declare(strict_types=1);

namespace App\Http\Handlers\API\Defibs\Inspections;

use App\Models\Defib;
use App\Models\Member;
use Illuminate\Http\JsonResponse;
use JustSteveKing\StatusCode\Http;
use App\Http\Resources\API\V1\DefibResource;
use App\Http\Requests\API\Defibs\StoreDefibInspectionRequest;

class StoreDefibInspectionsHandler
{
    public function __invoke(StoreDefibInspectionRequest $request, string $uuid): JsonResponse
    {
        $defib = Defib::query()->with(['notes', 'inspections'])->where('uuid', $uuid)->first();

        if (!$defib) {
            return new JsonResponse([], Http::NOT_FOUND);
        }

        $member = Member::where('uuid', $request->get('member_uuid'))->first();

        if (!$member) {
            return new JsonResponse(['message' => 'Invalid Member'], Http::UNPROCESSABLE_ENTITY);
        }

        $defib->inspections()->create([
            'member_id' => $member->id,
            'inspected_at' => $request->get('inspected_at'),
            'pads_expire_at' => $request->get('pads_expire_at'),
            'notes' => $request->get('notes'),
        ]);

        $defib->update(['pads_expire_at' => $request->get('pads_expire_at')]);

        return new JsonResponse(['data' => new DefibResource($defib->fresh())], Http::CREATED);
    }
}
