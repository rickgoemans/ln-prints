<?php

namespace App\Http\Resources;


use App\Models\Role as RoleModel;

/** @property-read RoleModel $resource */
class Role extends JsonResource
{
    /** {@inheritdoc} */
    public function toArray($request): array
    {
        return [
            ...$this->baseToArray(RoleModel::class),
            'name'        => $this->resource->name,
            'guard_name'  => $this->resource->guard_name,

            // Relations
            'permissions' => Permission::collection($this->whenLoaded('permissions')),
            'users'       => User::collection($this->whenLoaded('users')),
        ];
    }
}
