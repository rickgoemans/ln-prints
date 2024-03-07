<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    /** {@inheritdoc} */
    protected $model = Project::class;

    /** {@inheritdoc} */
    public function definition(): array
    {
        return [
            'nl_name'        => fake()->word(),
            'en_name'        => fake()->word(),
            'nl_description' => fake()->sentence(),
            'en_description' => fake()->sentence(),
        ];
    }
}
