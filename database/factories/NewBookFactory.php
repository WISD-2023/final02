<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\NewBook>
 */
class NewBookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = Category::all();
        return [
            'isbn' => $this->faker->isbn13,
            'category_id' => $categories->random()->ccl_id,
            'name' => $this->faker->word,
            'author' => $this->faker->name,
            'pp' => '碁峰資訊, 2020.02',
            'quantity' => $this->faker->numberBetween(1, 10),
            'price' => $this->faker->numberBetween(100, 1000),
        ];
    }
}
