<?php

declare(strict_types=1);

namespace App\Http\Resources\API\V1;

use App\Models\Defib;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Defib
 */
class DefibResource extends JsonResource
{
    /**
     * @param $request
     * @return mixed[]
     */
    public function toArray($request): array
    {
        return [
            'name' => $this->name,
            'location' => $this->location,
            'coordinates' => $this->coordinates,
            $this->mergeWhen(auth('sanctum')->check(), [
                'uuid' => $this->uuid,
                'display_on_map' => $this->display_on_map,
                'model' => $this->model,
                'serial' => $this->serial,
                'owner' => $this->owner,
                'last_inspected_by' => $this->last_inspected_by,
                'last_inspected_at' => $this->last_inspected_at,
                'last_serviced_at' => $this->last_serviced_at,
                'pads_expire_at' => $this->pads_expire_at,
                'notes' => DefibNoteResource::collection($this->notes),
                'inspections' => DefibInspectionResource::collection($this->inspections),
            ]),
        ];
    }
}
