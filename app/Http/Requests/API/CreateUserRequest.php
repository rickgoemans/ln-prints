<?php

namespace App\Http\Requests\API;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        /** @var User|null $user */
        $user = $this->user();

        return $user
            && $user->can('Create users');
    }

    public function rules(): array
    {
        return [
            'name'     => [
                'required',
                'string',
                'min:8',
                'max:255',
            ],
            'email'    => [
                'required',
                'email',
                'max:255',
                'unique:users',
            ],
            'password' => [
                'required',
                'string',
                'min:8',
                'password',
            ],
        ];
    }
}
