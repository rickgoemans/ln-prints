<?php

namespace App\Policies;

use App\Models\Permission;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PermissionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any permissions.
     *
     * @param  User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->can('View permissions');
    }

    /**
     * Determine whether the user can view the permission.
     *
     * @param  User|null  $user
     * @param  Permission  $permission
     * @return mixed
     */
    public function view(?User $user, Permission $permission)
    {
        if ($user === null) {
            return false;
        }

        if ($user->can($permission)) {
            return true;
        }

        return $user->can('View permissions');
    }

    /**
     * Determine whether the user can create permissions.
     *
     * @param  User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->can('Create permissions');
    }

    /**
     * Determine whether the user can update the permission.
     *
     * @param  User  $user
     * @param  Permission  $permission
     * @return mixed
     */
    public function update(User $user, Permission $permission)
    {
        return $user->can('Update permissions');
    }

    /**
     * Determine whether the user can delete the permission.
     *
     * @param  User  $user
     * @param  Permission  $permission
     * @return mixed
     */
    public function delete(User $user, Permission $permission)
    {
        return $user->can('Delete permissions');
    }

    /**
     * Determine whether the user can restore the permission.
     *
     * @param  User  $user
     * @param  Permission  $permission
     * @return mixed
     */
    public function restore(User $user, Permission $permission)
    {
        return $user->can('Restore permissions');
    }

    /**
     * Determine whether the user can permanently delete the permission.
     *
     * @param  User  $user
     * @param  Permission  $permission
     * @return mixed
     */
    public function forceDelete(User $user, Permission $permission)
    {
        return $user->can('Force delete permissions');
    }
}
