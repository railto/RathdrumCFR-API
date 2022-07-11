<?php

namespace App\Http\Requests\API\V1;

use Illuminate\Foundation\Http\FormRequest;

class StoreDefibInspectionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'member_uuid' => ['required', 'string'],
            'inspected_at' => ['required', 'date'],
            'pads_expire_at' => ['required', 'date'],
            'notes' => ['nullable', 'string'],
        ];
    }
}
