<?php

declare(strict_types=1);

namespace App\Http\Requests\API\Defibs;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Auth\Authenticatable;

class StoreDefibInspectionRequest extends FormRequest
{
    public function __construct(private Authenticatable $user)
    {
        parent::__construct();
    }

    public function authorize(): bool
    {
        return $this->user->can('defib.inspect');
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
