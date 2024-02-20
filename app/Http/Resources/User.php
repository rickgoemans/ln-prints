<?php

namespace App\Http\Resources;

use App\Models\User as UserModel;
use Illuminate\Support\Carbon;

/**
 * Class User
 *
 * @package App\Http\Resources
 * @property-read UserModel $resource
 */
class User extends JsonResource
{
    /**
     * @inheritdoc
     */
    public function toArray($request): array
    {
        return array_merge($this->baseToArray(UserModel::class), [
            'name'              => $this->resource->name,
            'email'             => $this->resource->email,
            'email_verified_at' => optional($this->resource->email_verified_at, fn(Carbon $emailVerifiedAt) => $emailVerifiedAt->toIso8601String()),

            // Relations
            'actions'           => Activity::collection($this->whenLoaded('actions')),
            'permission'        => Permission::collection($this->whenLoaded('permissions')),
            'roles'             => Role::collection($this->whenLoaded('roles')),
        ]);
    }
}
