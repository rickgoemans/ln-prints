<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Support\Enums\RoleName;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class UserSeeder extends Seeder
{
    /** {@inerhitdoc} */
    public function run(): void
    {
        $usersData = [
            [
                'name'  => 'Super Administrator',
                'email' => 'admin@admin.com',
                'role'  => RoleName::SuperAdministrators,
            ],
            [
                'name'  => 'Rick Goemans',
                'email' => 'rickgoemans@gmail.com',
                'role'  => RoleName::SuperAdministrators,
            ],
            [
                'name'  => 'Ellen Sesink',
                'email' => 'info@ln-prints.nl',
                'role'  => RoleName::Administrators,
            ],
        ];

        foreach ($usersData as $userData) {
            /** @var User $user */
            $user = User::factory()
                ->create([
                    'name'              => $userData['name'],
                    'email'             => $userData['email'],
                    'password'          => app()->isProduction()
                        ? fake()->password(8)
                        : 'admin',
                    'email_verified_at' => Carbon::now(),
                ]);

            /** @var Role $role */
            $role = Role::where('name', $userData['role']->value)
                ->first();

            if ($role) {
                $user->assignRole($role);
            }
        }

        if (app()->isProduction()) {
            return;
        }

        /** @var Collection $users */
        $users = User::factory()
            ->count(10)
            ->create();

    }
}
