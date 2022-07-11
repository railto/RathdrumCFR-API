<?php

declare(strict_types=1);

namespace App\Http\Resources\API\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class DefibResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request): array
    {
        return [
            'uuid' => $this->resource->uuid,
            'name' => $this->resource->name,
            'location' => $this->resource->location,
            'coordinates' => $this->resource->coordinates,
            $this->mergeWhen(auth('sanctum')->check(), [
                'display_on_map' => $this->resource->display_on_map,
                'model' => $this->resource->model,
                'serial' => $this->resource->serial,
                'owner' => $this->resource->owner,
                'last_inspected_by' => $this->resource->last_inspected_by,
                'last_inspected_at' => $this->resource->last_inspected_at,
                'last_serviced_at' => $this->resource->last_services_at,
                'pads_expire_at' => $this->resource->pads_expire_at,
                'notes' => DefibNoteResource::collection($this->resource->notes),
                'inspections' => DefibInspectionResource::collection($this->resource->inspections),
            ]),
        ];
    }
}
