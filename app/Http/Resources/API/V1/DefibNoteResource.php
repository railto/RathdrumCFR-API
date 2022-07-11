<?php

namespace App\Http\Resources\API\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class DefibNoteResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'uuid' => $this->resource->uuid,
            'author' => $this->resource->user->name,
            'note' => $this->resource->note,
            'created_at' => $this->resource->created_at->format('Y-m-d H:i:s'),
        ];
    }
}
