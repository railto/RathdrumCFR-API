<?php

declare(strict_types=1);

namespace App\Http\Resources\API\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class DefibInspectionResource extends JsonResource
{
    public function toArray($request): array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
    {
        return parent::toArray($request);
    }
}
