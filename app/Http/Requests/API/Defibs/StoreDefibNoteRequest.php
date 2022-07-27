<?php

declare(strict_types=1);

namespace App\Http\Requests\API\Defibs;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class StoreDefibNoteRequest extends FormRequest
{
    public function authorize(Request $request): bool
    {
        $user = $request->user();

        if (!$user) {
            return false;
        }

        return $user->can('defib.note');
    }

    /**
     * @return string[][]
     */
    public function rules(): array
    {
        return [
            'note' => ['string', 'required'],
        ];
    }
}
