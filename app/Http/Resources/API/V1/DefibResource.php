<?php

namespace App\Http\Resources\API\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class DefibResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request): array
    {
        $data = [
            'id' => $this->id,
            'name' => $this->name,
            'location' => $this->location,
            'coordinates' => $this->coordinates,
        ];

        if (auth('sanctum')->check()) {
            $data = array_merge($data, [
                'display_on_map' => $this->display_on_map,
                'model' => $this->model,
                'serial' => $this->serial,
                'owner' => $this->owner,
                'last_inspected_by' => $this->last_inspected_by,
                'last_inspected_at' => $this->last_inspected_at,
                'last_serviced_at' => $this->last_services_at,
                'pads_expire_at' => $this->pads_expire_at,
            ]);
        }

        return $data;
    }
}
