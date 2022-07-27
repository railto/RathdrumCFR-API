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
        $data = [
            'name' => $request->get('name'),
            'location' => $request->get('location'),
            'coordinates' => $request->get('coordinates'),
            'display_on_map' => $request->get('display_on_map'),
            'model' => $request->get('model'),
            'serial' => $request->get('serial'),
            'owner' => $request->get('owner'),
            'last_inspected_by' => $request->get('last_inspected_by'),
            'last_inspected_at' => $request->get('last_inspected_at'),
            'last_serviced_at' => $request->get('last_serviced_at'),
            'pads_expire_at' => $request->get('pads_expire_at'),
        ];

        $defib = Defib::create($data);

        return new JsonResponse(['data' => DefibResource::make($defib)], Http::CREATED);
    }
}
