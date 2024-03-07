<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'    => [
                'required',
                'min:2',
                'max:255',
            ],
            'email'   => [
                'required',
                'email',
            ],
            'subject' => [
                'required',
                'min:6',
                'max:255',
            ],
            'message' => [
                'required',
                'string',
                'min:20',
            ],
        ];
    }
}
