<?php

namespace App\Policies;

use App\Models\Activity;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ActivityPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->can('View activities');
    }

    public function view(?User $user, Activity $activity): bool
    {
        if ($user === null) {
            return false;
        }

        return $user->can('View activities');
    }

    public function create(User $user): bool
    {
        return $user->can('Create activities');
    }

    public function update(User $user, Activity $activity): bool
    {
        return $user->can('Update activities');
    }

    public function delete(User $user, Activity $activity): bool
    {
        return $user->can('Delete activities');
    }

    public function restore(User $user, Activity $activity): bool
    {
        return $user->can('Restore activities');
    }

    public function forceDelete(User $user, Activity $activity): bool
    {
        return $user->can('Force delete activities');
    }
}
