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
        return parent::toArray($request);
    }
}
