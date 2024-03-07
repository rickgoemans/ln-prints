<?php

namespace App\Policies;

use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->can('View roles');
    }

    public function view(?User $user, Role $role): bool
    {
        if ($user === null) {
            return false;
        }

        if ($user->hasRole($role)) {
            return true;
        }

        return $user->can('View roles');
    }

    public function create(User $user): bool
    {
        return $user->can('Create roles');
    }

    public function update(User $user, Role $role): bool
    {
        return $user->can('Update roles');
    }

    public function delete(User $user, Role $role): bool
    {
        return $user->can('Delete roles');
    }

    public function restore(User $user, Role $role): bool
    {
        return $user->can('Restore roles');
    }

    public function forceDelete(User $user, Role $role): bool
    {
        return $user->can('Force delete roles');
    }
}
