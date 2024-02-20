<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    /**
     * @inheritdoc
     */
    protected $model = Project::class;

    /**
     * @inheritdoc
     */
    public function definition(): array
    {
        return [
            'nl_name'        => $this->faker->word,
            'en_name'        => $this->faker->word,
            'nl_description' => $this->faker->sentence,
            'en_description' => $this->faker->sentence,
        ];
    }
}
