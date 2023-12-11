<?php

namespace Database\Factories;

use App\Models\NewBook;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TeachingMaterial>
 */
class TeachingMaterialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::where('permission', 2)->first();
        $newBook = NewBook::all();
        return [
            'user_id' => $user->id,
            'new_book_id' => $newBook->random()->id,
            'name' => $this->faker->name(),

        ];
    }
}
