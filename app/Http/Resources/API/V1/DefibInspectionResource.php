<?php

declare(strict_types=1);

namespace App\Http\Resources\API\V1;

use App\Models\DefibInspection;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin DefibInspection
 */
class DefibInspectionResource extends JsonResource
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
            'member' => $this->member?->name,
            'notes' => $this->notes,
            'inspected_at' => $this->inspected_at,
            'pads_expire_at' => $this->pads_expire_at,
        ];
    }
}
