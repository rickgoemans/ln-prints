<?php

namespace Database\Factories;

use App\Models\Permission;
use Illuminate\Database\Eloquent\Factories\Factory;

class PermissionFactory extends Factory
{
    /** {@inheritdoc} */
    protected $model = Permission::class;

    /** {@inheritdoc} */
    public function definition(): array
    {
        return [
            'name'       => fake()->word(),
            'guard_name' => fake()->randomElement(['web',]),
        ];
    }
}
