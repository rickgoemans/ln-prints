<?php

namespace Database\Factories;

use App\Models\Fabric;
use Illuminate\Database\Eloquent\Factories\Factory;

class FabricFactory extends Factory
{
    /**
     * @inheritdoc
     */
    protected $model = Fabric::class;

    /**
     * @inheritdoc
     */
    public function definition()
    {
        return [
            'article_number'             => $this->faker->uuid,
            'name'                       => $this->faker->word,
            'composition'                => $this->faker->sentence,
            'usable_width'               => $this->faker->randomNumber(),
            'weight'                     => $this->faker->randomNumber(),
            'nl_description'             => $this->faker->sentence,
            'en_description'             => $this->faker->sentence,
            'two_way_stretch'            => $this->faker->boolean,
            'pilling_resistant'          => $this->faker->boolean,
            'wrinkle_free_and_easy_care' => $this->faker->boolean,
            'quick_dry'                  => $this->faker->boolean,
            'breathable'                 => $this->faker->boolean,
            'moisture_management'        => $this->faker->boolean,
            'muscle_control'             => $this->faker->boolean,
            'uv_protection'              => $this->faker->boolean,
            'recycled_yarn'              => $this->faker->boolean,
            'active'                     => $this->faker->boolean,
        ];
    }
}
