<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\PaymentMethod;
use App\Models\TransactionLocation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UsedBook>
 */
class UsedBookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = Category::all();
        $payTypes = PaymentMethod::all();
        $tradePlaces = TransactionLocation::all();
        return [
            'category_id' => $categories->random()->ccl_id,
            'name' => $this->faker->word,
            'author' => $this->faker->name,
            'pp' => '碁峰資訊, 2020.02',
            'isbn' => $this->faker->isbn13,
            'book_image' => './public/images/abc.jpg',
            'book_state' => $this->faker->randomElement(['全新', '九成新', '八成新', '七成新', '六成新', '五成新', '五成新以下']),
            'price' => $this->faker->numberBetween(100, 1000),
            'description' => $this->faker->text,
            'pay_type' => $payTypes->random()->id,
            'trade_place' => $tradePlaces->random()->id,
            'trade_at' => $this->faker->dateTimeBetween('now','+2 week' ),
            'status' => 0,
        ];
    }
}
