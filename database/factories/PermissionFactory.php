<?php

namespace Database\Factories;

use App\Models\Permission;
use Illuminate\Database\Eloquent\Factories\Factory;

class PermissionFactory extends Factory
{
    /**
     * @inheritdoc
     */
    protected $model = Permission::class;

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
