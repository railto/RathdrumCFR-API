<?php

declare(strict_types=1);

namespace App\Http\Requests\API\Defibs;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Auth\Authenticatable;

class StoreDefibNoteRequest extends FormRequest
{
    public function __construct(private Authenticatable $user)
    {
        parent::__construct();
    }

    public function authorize(): bool
    {
        return $this->user->can('defib.note');
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
