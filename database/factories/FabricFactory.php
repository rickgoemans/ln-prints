<?php

namespace Database\Factories;

use App\Models\Fabric;
use Illuminate\Database\Eloquent\Factories\Factory;

class FabricFactory extends Factory
{
    /** {@inheritdoc} */
    protected $model = Fabric::class;

    /** {@inheritdoc} */
    public function definition(): array
    {
        return [
            'article_number'             => fake()->uuid(),
            'name'                       => fake()->word(),
            'composition'                => fake()->sentence(),
            'usable_width'               => fake()->randomNumber(),
            'weight'                     => fake()->randomNumber(),
            'nl_description'             => fake()->sentence(),
            'en_description'             => fake()->sentence(),
            'two_way_stretch'            => fake()->boolean(),
            'pilling_resistant'          => fake()->boolean(),
            'wrinkle_free_and_easy_care' => fake()->boolean(),
            'quick_dry'                  => fake()->boolean(),
            'breathable'                 => fake()->boolean(),
            'moisture_management'        => fake()->boolean(),
            'muscle_control'             => fake()->boolean(),
            'uv_protection'              => fake()->boolean(),
            'recycled_yarn'              => fake()->boolean(),
            'active'                     => fake()->boolean(),
        ];
    }
}
