<?php

namespace Database\Seeders;

use App\Models\NewBookCart;
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
        $newBookCarts = NewBookCart::where('type', 1)->get();
        foreach ($users as $user) {
            foreach ($newBookCarts as $newBookCart) {
                if($user->id == $newBookCart->id){
                    $is_owner = 1;
                }else{
                    $is_owner = 0;
                }
                NewBookCartsMember::factory()->create([
                    'user_id' => $user->id,
                    'new_book_cart_id' => $newBookCart->id,
                    'is_owner' => $is_owner,
                ]);
            }
        }

        $newBookCarts_private = NewBookCart::where('type', 2)->get();
        foreach ($newBookCarts_private as $newBookCart_private) {
            NewBookCartsMember::factory()->create([
                'user_id' => 1,
                'new_book_cart_id' => $newBookCart_private->id,
                'is_owner' => 1,
            ]);
        }
    }
}
