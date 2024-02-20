<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any user.
     *
     * @param  User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->can('View users');
    }

    /**
     * Determine whether the user can view the user.
     *
     * @param  User|null  $user
     * @param  User  $instance
     * @return mixed
     */
    public function view(?User $user, User $instance)
    {
        if ($user === null) {
            return false;
        }

        if ($user->id === $instance->id) {
            return true;
        }

        return $user->can('View users');
    }

    /**
     * Determine whether the user can create users.
     *
     * @param  User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->can('Create users');
    }

    /**
     * Determine whether the user can update the user.
     *
     * @param  User  $user
     * @param  User  $instance
     * @return mixed
     */
    public function update(User $user, User $instance)
    {
        if ($user->id === $instance->id) {
            return true;
        }

        if ($instance->isSuperAdmin()) {
            return false;
        }

        return $user->can('Update users');
    }

    /**
     * Determine whether the user can delete the user.
     *
     * @param  User  $user
     * @param  User  $instance
     * @return mixed
     */
    public function delete(User $user, User $instance)
    {
        if ($user->id === $instance->id) {
            return true;
        }

        if ($instance->isSuperAdmin()) {
            return false;
        }

        return $user->can('Delete users');
    }

    /**
     * Determine whether the user can restore the user.
     *
     * @param  User  $user
     * @param  User  $instance
     * @return mixed
     */
    public function restore(User $user, User $instance)
    {
        return $user->can('Restore users');
    }

    /**
     * Determine whether the user can permanently delete the user.
     *
     * @param  User  $user
     * @param  User  $instance
     * @return mixed
     */
    public function forceDelete(User $user, User $instance)
    {
        return $user->can('Force delete users');
    }
}
