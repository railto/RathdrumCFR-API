<?php

namespace App\Http\Requests\API\V1;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDefibRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['string', 'required'],
            'location' => ['string', 'required'],
            'coordinates' => ['string', 'nullable'],
            'display_on_map' => ['sometimes', 'boolean'],
            'model' => ['string', 'required'],
            'serial' => ['string', 'nullable'],
            'owner' => ['string', 'required'],
            'last_inspected_by' => ['string', 'nullable'],
            'last_inspected_at' => ['date', 'nullable'],
            'last_serviced_at' => ['date', 'nullable'],
            'pads_expire_at' => ['date', 'nullable'],
        ];
    }
}
