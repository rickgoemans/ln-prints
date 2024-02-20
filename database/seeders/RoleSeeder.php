<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Support\Enums\RoleName;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run()
    {
        foreach (RoleName::options() as $roleName) {
            if (!Role::whereName($roleName)->count()) {
                Role::factory()
                    ->create([
                        'name' => $roleName,
                    ]);
            }
        }

        if (app()->isProduction()) {
            return;
        }

        /** @var Collection $roles */
        $roles = Role::factory()
            ->count(10)
            ->create();
    }
}
