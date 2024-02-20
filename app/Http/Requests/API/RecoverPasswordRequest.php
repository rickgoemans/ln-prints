<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class RecoverPasswordRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => "required|string|exists:users,email",
        ];
    }
}
