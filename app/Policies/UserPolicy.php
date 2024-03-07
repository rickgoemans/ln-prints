<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->can('View users');
    }

    public function view(?User $user, User $instance): bool
    {
        if ($user === null) {
            return false;
        }

        if ($user->id === $instance->id) {
            return true;
        }

        return $user->can('View users');
    }

    public function create(User $user): bool
    {
        return $user->can('Create users');
    }

    public function update(User $user, User $instance): bool
    {
        if ($user->id === $instance->id) {
            return true;
        }

        if ($instance->isSuperAdmin()) {
            return false;
        }

        return $user->can('Update users');
    }

    public function delete(User $user, User $instance): bool
    {
        if ($user->id === $instance->id) {
            return true;
        }

        if ($instance->isSuperAdmin()) {
            return false;
        }

        return $user->can('Delete users');
    }

    public function restore(User $user, User $instance): bool
    {
        return $user->can('Restore users');
    }

    public function forceDelete(User $user, User $instance): bool
    {
        return $user->can('Force delete users');
    }
}
