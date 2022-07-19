<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Classroom>
 */
class ClassroomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'section' => $this->faker->name(),
            'grade' => $this->faker->numberBetween(2,100),
            'teacher_id' => $this->faker->randomDigitNotNull(),
        ];
    }
}
