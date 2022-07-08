<?php

namespace App\Http\Resources\API\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class DefibNoteResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->resource->id,
            'defib_id' => $this->resource->defib_id,
            'user_id' => $this->resource->user_id,
            'note' => $this->resource->note,
        ];
    }
}
