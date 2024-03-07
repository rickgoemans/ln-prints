<?php

namespace App\Http\Requests\API;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ResetPasswordRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'token'    => [
                'required',
            ],
            'email'    => [
                'required',
                'email',
                Rule::exists(User::class, 'email'),
            ],
            'password' => [
                'required',
                'confirmed',
                'min:8',
            ],
        ];
    }
}
