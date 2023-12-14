<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Permission>
 */
class PermissionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $permissions = [ '會員', '校方', '教師', '平台人員'];
        return [
            'name' => $this -> faker -> unique() -> randomElement($permissions),
        ];
    }
}
