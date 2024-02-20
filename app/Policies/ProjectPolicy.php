<?php

namespace App\Policies;

use App\Models\Project;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProjectPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any projects.
     *
     * @param  User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->can('View projects');
    }

    /**
     * Determine whether the user can view the project.
     *
     * @param  User|null  $user
     * @param  Project  $project
     * @return mixed
     */
    public function view(?User $user, Project $project)
    {
        if ($user === null) {
            return false;
        }

        return $user->can('View projects');
    }

    /**
     * Determine whether the user can create projects.
     *
     * @param  User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->can('Create projects');
    }

    /**
     * Determine whether the user can update the project.
     *
     * @param  User  $user
     * @param  Project  $project
     * @return mixed
     */
    public function update(User $user, Project $project)
    {
        return $user->can('Update projects');
    }

    /**
     * Determine whether the user can delete the project.
     *
     * @param  User  $user
     * @param  Project  $project
     * @return mixed
     */
    public function delete(User $user, Project $project)
    {
        return $user->can('Delete projects');
    }

    /**
     * Determine whether the user can restore the project.
     *
     * @param  User  $user
     * @param  Project  $project
     * @return mixed
     */
    public function restore(User $user, Project $project)
    {
        return $user->can('Restore projects');
    }

    /**
     * Determine whether the user can permanently delete the project.
     *
     * @param  User  $user
     * @param  Project  $project
     * @return mixed
     */
    public function forceDelete(User $user, Project $project)
    {
        return $user->can('Force delete projects');
    }
}
