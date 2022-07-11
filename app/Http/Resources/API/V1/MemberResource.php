<?php

namespace App\Http\Resources\API\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class MemberResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'uuid' => $this->resource->uuid,
            'name' => $this->resource->name,
            'phone' => $this->resource->phone,
            'email' => $this->resource->email,
            'address_1' => $this->resource->address_1,
            'address_2' => $this->resource->address_2,
            'eircode' => $this->resource->eircode,
            'title' => $this->resource->title,
            'status' => $this->resource->status,
            'cfr_certificate_number' => $this->resource->cfr_certificate_number,
            'cfr_certificate_expiry' => $this->resource->cfr_certificate_expiry,
            'volunteer_declaration' => $this->resource->volunteer_declaration,
            'garda_vetting_id' => $this->resource->garda_vetting_id,
            'garda_vetting_date' => $this->resource->garda_vetting_date,
            'cism_completed' => $this->resource->cism_completed,
            'child_first_completed' => $this->resource->child_first_completed,
            'ppe_community_completed' => $this->resource->ppe_community_completed,
            'ppe_acute_completed' => $this->resource->ppe_acute_completed,
            'hand_hygiene_completed' => $this->resource->hand_hygiene_completed,
            'hiqa_completed' => $this->resource->hiqa_completed,
            'covid_return_completed' => $this->resource->covid_return_completed,
            'ppe_assessment_completed' => $this->resource->ppe_assessment_completed,
        ];
    }
}
