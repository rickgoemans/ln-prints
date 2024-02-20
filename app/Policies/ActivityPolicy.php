<?php

namespace App\Policies;

use App\Models\Activity;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ActivityPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any activity.
     *
     * @param  User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->can('View activities');
    }

    /**
     * Determine whether the user can view the activity.
     *
     * @param  User|null  $user
     * @param  Activity  $activity
     * @return mixed
     */
    public function view(?User $user, Activity $activity)
    {
        if ($user === null) {
            return false;
        }

        return $user->can('View activities');
    }

    /**
     * Determine whether the user can create activities.
     *
     * @param  User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->can('Create activities');
    }

    /**
     * Determine whether the user can update the activity.
     *
     * @param  User  $user
     * @param  Activity  $activity
     * @return mixed
     */
    public function update(User $user, Activity $activity)
    {
        return $user->can('Update activities');
    }

    /**
     * Determine whether the user can delete the activity.
     *
     * @param  User  $user
     * @param  Activity  $activity
     * @return mixed
     */
    public function delete(User $user, Activity $activity)
    {
        return $user->can('Delete activities');
    }

    /**
     * Determine whether the user can restore the activity.
     *
     * @param  User  $user
     * @param  Activity  $activity
     * @return mixed
     */
    public function restore(User $user, Activity $activity)
    {
        return $user->can('Restore activities');
    }

    /**
     * Determine whether the user can permanently delete the activity.
     *
     * @param  User  $user
     * @param  Activity  $activity
     * @return mixed
     */
    public function forceDelete(User $user, Activity $activity)
    {
        return $user->can('Force delete activities');
    }
}
