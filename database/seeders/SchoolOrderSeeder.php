<?php

namespace Database\Seeders;

use App\Models\NewBookCart;
use App\Models\SchoolOrder;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SchoolOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::where('permission', 4)->get();
        $newBookCarts = NewBookCart::where('is_submit', true)->get();
        foreach ($newBookCarts as $newBookCart){
            $user = $users->random();
            SchoolOrder::create([
                'new_book_cart_id' => $newBookCart->id,
                'payment' => true,
                'handler_id' => $user -> id,
                'status' => 4,
            ]);
        }
    }
}
