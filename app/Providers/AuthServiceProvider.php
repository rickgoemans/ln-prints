<?php

namespace App\Providers;

use App\Models\Activity;
use App\Models\Fabric;
use App\Models\Permission;
use App\Models\Project;
use App\Models\Role;
use App\Models\User;
use App\Policies\ActivityPolicy;
use App\Policies\FabricPolicy;
use App\Policies\PermissionPolicy;
use App\Policies\ProjectPolicy;
use App\Policies\RolePolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /** {@inerhitdoc} */
    protected $policies = [
        Activity::class   => ActivityPolicy::class,
        Fabric::class     => FabricPolicy::class,
        Permission::class => PermissionPolicy::class,
        Project::class    => ProjectPolicy::class,
        Role::class       => RolePolicy::class,
        User::class       => UserPolicy::class,
    ];

    /** {@inerhitdoc} */
    public function boot(): void
    {
        $this->registerPolicies();

        // Implicitly grant "Super Administrators" role all permissions
        // This works in the app by using gate-related functions like auth()->user->can() and @can()
        Gate::before(function (?User $user, $ability) {
            return $user
            && $user->hasRole('Super Administrators')
                ? true
                : null;
        });
    }
}
