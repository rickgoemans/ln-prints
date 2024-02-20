<?php

namespace App\Http\Requests\API;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class DeleteUserRequest
 *
 * @package App\Http\Requests\API
 * @property-read User $user
 */
class DeleteUserRequest extends FormRequest
{

    public function authorize(): bool
    {
        /** @var User|null $user */
        $user = $this->user();

        return $user
            && ($this->user->getKey() == $user->getKey()
                || $user->can('Delete users'));
    }


    public function rules(): array
    {
        return [];
    }
}
