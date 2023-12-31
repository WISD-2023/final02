<?php

namespace Database\Seeders;

use App\Models\NewBookCart;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class NewBookCartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $users = User::where('permission', 1)->get()->count();
        for($i = 0; $i < $users; $i++){
            NewBookCart::create([
                'name' => $faker -> word,
                'invite_code' =>  now() -> format('YmdHis'),
                'type' => $faker -> randomElement([1, 2]),
                'deadline_at' => $faker -> dateTimeBetween('now', '+2 week'),
                'is_submit' => $faker -> randomElement([true, false]),
            ]);
        }
    }
}
