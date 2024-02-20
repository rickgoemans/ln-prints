<?php

namespace Database\Factories;

use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoleFactory extends Factory
{
    /**
     * @inheritdoc
     */
    protected $model = Role::class;

    /**
     * @inheritdoc
     */
    public function definition()
    {
        return [
            'name'       => $this->faker->word,
            'guard_name' => $this->faker->randomElement(['web',]),
        ];
    }
}
