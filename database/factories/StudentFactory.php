<?php

namespace Database\Factories;

use App\Models\User;
use Database\Factories\Helpers\FactoryHelper;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => FactoryHelper::getRandomModelId(User::class),
            'first_name' => $this->faker->name(),
            'second_name' => $this->faker->name(),
            'gender' => $this->faker->word(),
        ];
    }
}
