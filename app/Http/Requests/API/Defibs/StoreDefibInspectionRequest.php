<?php

declare(strict_types=1);

namespace App\Http\Requests\API\Defibs;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class StoreDefibInspectionRequest extends FormRequest
{
    public function authorize(Request $request): bool
    {
        $user = $request->user();

        if (!$user) {
            return false;
        }

        return $user->can('defib.inspect');
    }

    /**
     * @return string[][]
     */
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
