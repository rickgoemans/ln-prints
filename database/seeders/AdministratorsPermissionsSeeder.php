<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Support\Enums\RoleName;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;
use Spatie\Permission\PermissionRegistrar;

class AdministratorsPermissionsSeeder extends Seeder
{
    /** {@inerhitdoc} */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        /** @var Role $role */
        $role = Role::where('name', RoleName::Administrators)
            ->first();

        if ($role) {
            /** @var array $permissionNames */
            $permissionNames = config('ln-prints.permissions.roles.' . RoleName::Administrators->value);

            /** @var Collection $permissions */
            $permissions = Permission::whereIn('name', $permissionNames)
                ->get();

            $role->permissions()
                ->sync($permissions->pluck('id')
                    ->toArray());

            // Reset cached roles and permissions
            app()[PermissionRegistrar::class]->forgetCachedPermissions();
        }
    }
}
