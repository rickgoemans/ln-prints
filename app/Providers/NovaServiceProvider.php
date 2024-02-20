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
use Sbine\RouteViewer\RouteViewer;
use Spatie\BackupTool\BackupTool;
use Strandafili\NovaInstalledPackages\Tool as PackagesTool;
use Vyuldashev\NovaPermission\NovaPermissionTool;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Register the Nova routes.
     *
     * @return void
     */
    protected function routes()
    {
        Nova::routes()
            ->withAuthenticationRoutes()
            ->withPasswordResetRoutes()
            ->register();
    }

    /**
     * @inheritdoc
     */
    protected function gate()
    {
        Gate::define('viewNova', function (?User $user) {
            return $user && $user->can(config('ln-prints.permissions.packages.nova'));
        });
    }

    /**
     * @inheritdoc
     */
    protected function cards(): array
    {
        return [
            new Help,
        ];
    }

    /**
     * @inheritdoc
     */
    protected function dashboards(): array
    {
        return [

        ];
    }

    /**
     * @inheritdoc
     */
    public function tools(): array
    {
        return [
            $this->backupTool(),
            $this->packagesTool(),
            $this->routeViewerTool(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function register()
    {
        //
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

    protected function packagesTool(): Tool
    {
        return (new PackagesTool())
            ->canSee(function (Request $request) {
                /** @var User|null $user */
                $user = $request->user();

                return $user && $user->can(config('ln-prints.permissions.packages.nova-packages-tool'));
            });
    }

    protected function permissionsTool(): Tool
    {
        return (new NovaPermissionTool())
            ->roleResource(Permission::class)
            ->permissionResource(Role::class)
            ->canSeeWhen(config('ln-prints.permissions.packages.nova-permissions-tool'));
    }

    protected function routeViewerTool(): Tool
    {
        return (new RouteViewer())
            ->canSee(function (Request $request) {
                /** @var User|null $user */
                $user = $request->user();

                return $user && $user->can(config('ln-prints.permissions.packages.nova-route-viewer-tool'));
            });
    }
}
