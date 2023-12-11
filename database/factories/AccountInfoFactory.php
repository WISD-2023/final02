<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AccountInfo>
 */
class AccountInfoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'bank_branch' => $this -> faker -> numberBetween($min = 100, $max = 999),
            'account' => $this -> faker -> numberBetween($min = 0000000001, $max = 9999999999),
        ];
    }
}
