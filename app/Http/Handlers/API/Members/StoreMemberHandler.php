<?php

declare(strict_types=1);

namespace App\Http\Handlers\API\Members;

use App\Models\Member;
use Illuminate\Http\JsonResponse;
use JustSteveKing\StatusCode\Http;
use App\Http\Resources\API\V1\MemberResource;
use App\Http\Requests\API\Members\StoreMemberRequest;

class StoreMemberHandler
{
    public function __invoke(StoreMemberRequest $request): JsonResponse
    {
        $data = [
            'name' => $request->get('name'),
            'phone' => $request->get('phone'),
            'email' => $request->get('email'),
            'address_1' => $request->get('address_1'),
            'address_2' => $request->get('address_2'),
            'eircode' => $request->get('eircode'),
            'title' => $request->get('title'),
            'status' => $request->get('status'),
            'cfr_certificate_number' => $request->get('cfr_certificate_number'),
            'cfr_certificate_expiry' => $request->get('cfr_certificate_expiry'),
            'volunteer_declaration' => $request->get('volunteer_declaration'),
            'garda_vetting_id' => $request->get('garda_vetting_id'),
            'garda_vetting_date' => $request->get('garda_vetting_date'),
            'cism_completed' => $request->get('cism_completed'),
            'child_first_completed' => $request->get('child_first_completed'),
            'ppe_community_completed' => $request->get('ppe_community_completed'),
            'ppe_acute_completed' => $request->get('ppe_acute_completed'),
            'hand_hygiene_completed' => $request->get('hand_hygiene_completed'),
            'hiqa_completed' => $request->get('hiqa_completed'),
            'covid_return_completed' => $request->get('covid_return_completed'),
            'ppe_assessment_completed' => $request->get('ppe_assessment_completed'),
        ];

        $member = Member::create($data);

        return new JsonResponse(['data' => MemberResource::make($member)], Http::CREATED);
    }
}
