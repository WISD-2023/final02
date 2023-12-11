<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TeacherAuth>
 */
class TeacherAuthFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'work_proof' => $this->faker->imageUrl(),
            'auth_at' => $this->faker->date(),
            'auth_by' => 12,
            'status' => 1,
        ];
    }
}
