<?php

declare(strict_types=1);

namespace App\Http\Requests\API\V1;

use App\Models\Defib;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class StoreDefibNoteRequest extends FormRequest
{
    public function authorize(Request $request): bool
    {
        return $request->user()->can('defib.note');
    }

    public function rules(): array
    {
        return [
            'note' => ['string', 'required'],
        ];
    }
}
