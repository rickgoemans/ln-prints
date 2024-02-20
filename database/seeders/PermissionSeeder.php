<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        /** @var array $permissionNames */
        $permissionNames = config('ln-prints.permissions.all');

        $existingPermissionNames = Permission::all()->pluck('name')
            ->toArray();

        $newPermissionNames = array_filter($permissionNames, function (string $permissionName) use ($existingPermissionNames) {
            return !in_array($permissionName, $existingPermissionNames);
        });

        $permissions = array_map(function (string $permissionName) {
            return [
                'name'       => $permissionName,
                'guard_name' => 'web',
            ];
        }, $newPermissionNames);

        Permission::upsert($permissions, [
            'name',
            'guard_name',
        ]);

        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
    }
}
