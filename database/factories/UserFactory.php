<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * @inheritdoc
     */
    protected $model = User::class;

    /**
     * @inheritdoc
     */
    public function definition()
    {
        return [
            'name'              => $this->faker->name,
            'email'             => $this->faker->unique()
                ->safeEmail,
            'email_verified_at' => $this->faker->optional()
                ->dateTime,
            'password'          => $this->faker->password(8),
            'remember_token'    => Str::random(10),
        ];
    }
}
