<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(AdministratorsPermissionsSeeder::class);
        $this->call(MembersPermissionsSeeder::class);
    }
}
