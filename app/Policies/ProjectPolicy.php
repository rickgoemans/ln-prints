<?php

namespace App\Policies;

use App\Models\Project;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProjectPolicy
{
    use HandlesAuthorization;


    public function viewAny(User $user): bool
    {
        return $user->can('View projects');
    }

    public function view(?User $user, Project $project): bool
    {
        if ($user === null) {
            return false;
        }

        return $user->can('View projects');
    }

    public function create(User $user): bool
    {
        return $user->can('Create projects');
    }

    public function update(User $user, Project $project): bool
    {
        return $user->can('Update projects');
    }

    public function delete(User $user, Project $project): bool
    {
        return $user->can('Delete projects');
    }

    public function restore(User $user, Project $project): bool
    {
        return $user->can('Restore projects');
    }

    public function forceDelete(User $user, Project $project): bool
    {
        return $user->can('Force delete projects');
    }
}
