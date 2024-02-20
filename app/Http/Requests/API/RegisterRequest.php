<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'     => "required|string|min:2|max:255",
            'email'    => "required|email|max:255|unique:users",
            'password' => "required|string|min:8|passwordFormat",
        ];
    }
}
