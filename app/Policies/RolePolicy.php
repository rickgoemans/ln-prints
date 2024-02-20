<?php

namespace App\Policies;

use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any role.
     *
     * @param  User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->can('View roles');
    }

    /**
     * Determine whether the user can view the role.
     *
     * @param  User|null  $user
     * @param  Role  $role
     * @return mixed
     */
    public function view(?User $user, Role $role)
    {
        if ($user === null) {
            return false;
        }

        if ($user->hasRole($role)) {
            return true;
        }

        return $user->can('View roles');
    }

    /**
     * Determine whether the user can create roles.
     *
     * @param  User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->can('Create roles');
    }

    /**
     * Determine whether the user can update the role.
     *
     * @param  User  $user
     * @param  Role  $role
     * @return mixed
     */
    public function update(User $user, Role $role)
    {
        return $user->can('Update roles');
    }

    /**
     * Determine whether the user can delete the role.
     *
     * @param  User  $user
     * @param  Role  $role
     * @return mixed
     */
    public function delete(User $user, Role $role)
    {
        return $user->can('Delete roles');
    }

    /**
     * Determine whether the user can restore the role.
     *
     * @param  User  $user
     * @param  Role  $role
     * @return mixed
     */
    public function restore(User $user, Role $role)
    {
        return $user->can('Restore roles');
    }

    /**
     * Determine whether the user can permanently delete the role.
     *
     * @param  User  $user
     * @param  Role  $role
     * @return mixed
     */
    public function forceDelete(User $user, Role $role)
    {
        return $user->can('Force delete roles');
    }
}
