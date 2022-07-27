<?php

declare(strict_types=1);

namespace App\Http\Requests\API\Members;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class StoreMemberRequest extends FormRequest
{
    public function authorize(Request $request): bool
    {
        $user = $request->user();

        if (!$user) {
            return false;
        }

        return $user->can('member.create');
    }

    /**
     * @return string[][]
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'phone' => ['nullable', 'string'],
            'email' => ['nullable', 'string', 'email'],
            'address_1' => ['nullable', 'string'],
            'address_2' => ['nullable', 'string'],
            'eircode' => ['nullable', 'string'],
            'title' => ['nullable', 'string'],
            'status' => ['required', 'string'],
            'cfr_certificate_number' => ['nullable', 'string'],
            'cfr_certificate_expiry' => ['nullable', 'date'],
            'volunteer_declaration' => ['nullable', 'date'],
            'garda_vetting_id' => ['nullable', 'string'],
            'garda_vetting_date' => ['nullable', 'date'],
            'cism_completed' => ['nullable', 'date'],
            'child_first_completed' => ['nullable', 'date'],
            'ppe_community_completed' => ['nullable', 'date'],
            'ppe_acute_completed' => ['nullable', 'date'],
            'hand_hygiene_completed' => ['nullable', 'date'],
            'hiqa_completed' => ['nullable', 'date'],
            'covid_return_completed' => ['nullable', 'date'],
            'ppe_assessment_completed' => ['nullable', 'date'],
        ];
    }
}
