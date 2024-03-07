<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /** {@inheritdoc} */
    protected $model = User::class;

    /** {@inheritdoc} */
    public function definition(): array
    {
        return [
            'name'              => fake()->name(),
            'email'             => fake()->unique()
                ->safeEmail,
            'email_verified_at' => fake()->optional()
                ->dateTime,
            'password'          => fake()->password(8),
            'remember_token'    => Str::random(10),
        ];
    }
}
