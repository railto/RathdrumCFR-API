<?php

declare(strict_types=1);

namespace App\Http\Resources\API\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class DefibInspectionResource extends JsonResource
{
    /**
     * @param $request
     * @return mixed[]
     */
    public function toArray($request): array
    {
        return [
            'uuid' => $this->resource->uuid,
            'author' => $this->resource->user->name,
            'member' => $this->resource->member->name,
            'notes' => $this->resource->notes,
            'inspected_at' => $this->resource->inspected_at->format('Y-m-d H:i:s'),
            'pads_expire_at' => $this->resource->pads_expire_at->format('Y-m-d'),
        ];
    }
}
