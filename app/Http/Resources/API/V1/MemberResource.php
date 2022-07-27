<?php

declare(strict_types=1);

namespace App\Http\Resources\API\V1;

use App\Models\Member;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Member
 */
class MemberResource extends JsonResource
{
    /**
     * @param $request
     * @return mixed[]
     */
    public function toArray($request): array
    {
        return [
            'uuid' => $this->uuid,
            'name' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email,
            'address_1' => $this->address_1,
            'address_2' => $this->address_2,
            'eircode' => $this->eircode,
            'title' => $this->title,
            'status' => $this->status,
            'cfr_certificate_number' => $this->cfr_certificate_number,
            'cfr_certificate_expiry' => $this->cfr_certificate_expiry,
            'volunteer_declaration' => $this->volunteer_declaration,
            'garda_vetting_id' => $this->garda_vetting_id,
            'garda_vetting_date' => $this->garda_vetting_date,
            'cism_completed' => $this->cism_completed,
            'child_first_completed' => $this->child_first_completed,
            'ppe_community_completed' => $this->ppe_community_completed,
            'ppe_acute_completed' => $this->ppe_acute_completed,
            'hand_hygiene_completed' => $this->hand_hygiene_completed,
            'hiqa_completed' => $this->hiqa_completed,
            'covid_return_completed' => $this->covid_return_completed,
            'ppe_assessment_completed' => $this->ppe_assessment_completed,
        ];
    }
}
