<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Support\Enums\RoleName;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /** {@inerhitdoc} */
    public function run(): void
    {
        foreach (RoleName::cases() as $roleName) {
            if (!Role::whereName($roleName->value)->count()) {
                Role::factory()
                    ->create([
                        'name' => $roleName->value,
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
