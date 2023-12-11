<?php

namespace Database\Seeders;

use App\Models\NewBookCartsItem;
use App\Models\NewBookCartsMember;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewBookCartsMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::where('permission', 1)->get();
        $newBookCartsItems = NewBookCartsItem::all();
        foreach ($users as $user) {
            foreach ($newBookCartsItems as $newBookCartsItem) {
                NewBookCartsMember::factory()->create([
                    'user_id' => $user->id,
                    'cart_item_id' => $newBookCartsItem->id,
                    'quantity' => rand(1, 10),
                ]);
            }
        }
    }
}
