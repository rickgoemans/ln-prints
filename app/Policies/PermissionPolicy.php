<?php

namespace App\Policies;

use App\Models\Permission;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PermissionPolicy
{
    use HandlesAuthorization;


    public function viewAny(User $user): bool
    {
        return $user->can('View permissions');
    }

    public function view(?User $user, Permission $permission): bool
    {
        if ($user === null) {
            return false;
        }

        if ($user->can($permission)) {
            return true;
        }

        return $user->can('View permissions');
    }

    public function create(User $user): bool
    {
        return $user->can('Create permissions');
    }

    public function update(User $user, Permission $permission): bool
    {
        return $user->can('Update permissions');
    }

    public function delete(User $user, Permission $permission): bool
    {
        return $user->can('Delete permissions');
    }

    public function restore(User $user, Permission $permission): bool
    {
        return $user->can('Restore permissions');
    }

    public function forceDelete(User $user, Permission $permission): bool
    {
        return $user->can('Force delete permissions');
    }
}
