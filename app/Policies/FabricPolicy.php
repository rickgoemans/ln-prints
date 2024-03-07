<?php

namespace App\Policies;

use App\Models\Fabric;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FabricPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->can('View fabrics');
    }

    public function view(?User $user, Fabric $fabric): bool
    {
        if ($user === null) {
            return false;
        }

        return $user->can('View fabrics');
    }

    public function create(User $user): bool
    {
        return $user->can('Create fabrics');
    }

    public function update(User $user, Fabric $fabric): bool
    {
        return $user->can('Update fabrics');
    }

    public function delete(User $user, Fabric $fabric): bool
    {
        return $user->can('Delete fabrics');
    }

    public function restore(User $user, Fabric $fabric): bool
    {
        return $user->can('Restore fabrics');
    }

    public function forceDelete(User $user, Fabric $fabric): bool
    {
        return $user->can('Force delete fabrics');
    }
}
