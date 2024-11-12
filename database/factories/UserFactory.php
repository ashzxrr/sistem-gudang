<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected $model = \App\Models\User::class;

    public function definition(): array
    {
        return [
           'nama' => $this->faker->name,
           'email' => $this->faker->unique()->safeEmail,
           'password' => Hash::make('password'),
           'created_at' => now(),
           'updated_at' => now(),

        ];
    }
}
