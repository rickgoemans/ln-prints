<?php

namespace App\Providers;

use App\Models\User;
use App\Nova\Permission;
use App\Nova\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\Cards\Help;
use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;
use Laravel\Nova\Tool;
use Spatie\BackupTool\BackupTool;
use Vyuldashev\NovaPermission\NovaPermissionTool;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /** {@inerhitdoc} */
    public function boot(): void
    {
        parent::boot();
    }

    /** {@inheritdoc} */
    public function tools(): array
    {
        return [
            $this->backupTool(),
        ];
    }

    /** {@inheritdoc} */
    public function register()
    {
        //
    }

    /** {@inerhitdoc} */
    protected function routes(): void
    {
        Nova::routes()
            ->withAuthenticationRoutes()
            ->withPasswordResetRoutes()
            ->register();
    }

    /** {@inheritdoc} */
    protected function gate(): void
    {
        Gate::define('viewNova', function (?User $user) {
            return $user && $user->can(config('ln-prints.permissions.packages.nova'));
        });
    }

    /** {@inheritdoc} */
    protected function cards(): array
    {
        return [
            new Help,
        ];
    }

    /** {@inheritdoc} */
    protected function dashboards(): array
    {
        return [

        ];
    }

    protected function backupTool(): Tool
    {
        return (new BackupTool())
            ->canSee(function (Request $request) {
                /** @var User|null $user */
                $user = $request->user();

                return $user && $user->can(config('ln-prints.permissions.packages.nova-backups-tool'));
            });
    }


    protected function permissionsTool(): Tool
    {
        return (new NovaPermissionTool())
            ->roleResource(Permission::class)
            ->permissionResource(Role::class)
            ->canSeeWhen(config('ln-prints.permissions.packages.nova-permissions-tool'));
    }
}
