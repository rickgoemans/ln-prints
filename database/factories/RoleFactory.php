<?php

namespace Database\Factories;

use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoleFactory extends Factory
{
    /** {@inheritdoc} */
    protected $model = Role::class;

    /** {@inheritdoc} */
    public function definition(): array
    {
        return [
            'name'       => fake()->word(),
            'guard_name' => fake()->randomElement(['web',]),
        ];
    }
}
