<?php

namespace Database\Seeders;

use App\Models\NewBook;
use App\Models\NewBookCart;
use App\Models\NewBookCartsItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewBookCartsItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $newBookCarts = NewBookCart::all();
        $newBooks = NewBook::all();
        foreach ($newBookCarts as $newBookCart){
            for ($i = 0; $i < 2; $i++){
                $newBook = $newBooks->random();
                NewBookCartsItem::create([
                    'new_book_cart_id' => $newBookCart->id,
                    'new_book_id' => $newBook-> id,
                ]);
            }
        }
    }
}
