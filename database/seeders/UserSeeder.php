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
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usersData = [
            [
                'name'  => 'Super Administrator',
                'email' => 'admin@admin.com',
                'role'  => RoleName::SUPER_ADMINISTRATORS,
            ],
            [
                'name'  => 'Rick Goemans',
                'email' => 'rickgoemans@gmail.com',
                'role'  => RoleName::SUPER_ADMINISTRATORS,
            ],
            [
                'name'  => 'Ellen Sesink',
                'email' => 'info@ln-prints.nl',
                'role'  => RoleName::ADMINISTRATORS,
            ],
        ];

        foreach ($usersData as $userData) {
            /** @var User $user */
            $user = User::factory()
                ->create([
                    'name'              => $userData['name'],
                    'email'             => $userData['email'],
                    'password'          => in_array(app()->environment(), ['local', 'testing'])
                        ? 'admin'
                        : 'y!0r7z@r9!e@V9RuSpaG',
                    'email_verified_at' => Carbon::now(),
                ]);

            /** @var Role $role */
            $role = Role::where('name', $userData['role'])
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
