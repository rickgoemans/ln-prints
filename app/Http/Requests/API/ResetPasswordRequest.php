<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'token'    => "required",
            'email'    => "required|email|exists:users,email",
            'password' => "required|confirmed|min:8",
        ];
    }
}
