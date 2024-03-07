<?php

namespace App\Http\Resources;

use App\Models\Permission as PermissionModel;

/** @property-read PermissionModel $resource */
class Permission extends JsonResource
{
    /** {@inheritdoc} */
    public function toArray($request): array
    {
        return [
            ...$this->baseToArray(PermissionModel::class),
            'name'       => $this->resource->name,
            'guard_name' => $this->resource->guard_name,

            // Relations
            'roles'      => Role::collection($this->whenLoaded('roles')),
            'users'      => User::collection($this->whenLoaded('users')),
        ];
    }
}
