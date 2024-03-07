<?php

namespace App\Http\Requests\API;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{

    public function authorize(): bool
    {
        /** @var User|null $user */
        $user = $this->user();

        return $user
            && ($this->user->getKey() == $user->getKey()
                || $user->can('Update users'));
    }


    public function rules(): array
    {
        return [
            'name'     => [
                'required',
                'string',
                'min:2',
                'max:255',
            ],
            'email'    => [
                'required',
                'email',
                'max:255',
                Rule::unique(User::class, 'email')
                    ->ignore($this->user->id),
            ],
            'password' => [
                'nullable',
                'string',
                'min:8',
                'passwordFormat',
            ],
        ];
    }
}
