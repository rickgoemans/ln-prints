<?php

namespace App\Policies;

use App\Models\Fabric;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FabricPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any fabrics.
     *
     * @param  User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->can('View fabrics');
    }

    /**
     * Determine whether the user can view the fabric.
     *
     * @param  User|null  $user
     * @param  Fabric  $fabric
     * @return mixed
     */
    public function view(?User $user, Fabric $fabric)
    {
        if ($user === null) {
            return false;
        }

        return $user->can('View fabrics');
    }

    /**
     * Determine whether the user can create fabrics.
     *
     * @param  User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->can('Create fabrics');
    }

    /**
     * Determine whether the user can update the fabric.
     *
     * @param  User  $user
     * @param  Fabric  $fabric
     * @return mixed
     */
    public function update(User $user, Fabric $fabric)
    {
        return $user->can('Update fabrics');
    }

    /**
     * Determine whether the user can delete the fabric.
     *
     * @param  User  $user
     * @param  Fabric  $fabric
     * @return mixed
     */
    public function delete(User $user, Fabric $fabric)
    {
        return $user->can('Delete fabrics');
    }

    /**
     * Determine whether the user can restore the fabric.
     *
     * @param  User  $user
     * @param  Fabric  $fabric
     * @return mixed
     */
    public function restore(User $user, Fabric $fabric)
    {
        return $user->can('Restore fabrics');
    }

    /**
     * Determine whether the user can permanently delete the fabric.
     *
     * @param  User  $user
     * @param  Fabric  $fabric
     * @return mixed
     */
    public function forceDelete(User $user, Fabric $fabric)
    {
        return $user->can('Force delete fabrics');
    }
}
