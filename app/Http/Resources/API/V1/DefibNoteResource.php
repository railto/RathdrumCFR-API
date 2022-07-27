<?php

declare(strict_types=1);

namespace App\Http\Resources\API\V1;

use App\Models\DefibNote;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin DefibNote
 */
class DefibNoteResource extends JsonResource
{
    /**
     * @param $request
     * @return mixed[]
     */
    public function toArray($request): array
    {
        return [
            'uuid' => $this->uuid,
            'author' => $this->user?->name,
            'note' => $this->note,
            'created_at' => $this->created_at?->format('Y-m-d H:i:s'),
        ];
    }
}
