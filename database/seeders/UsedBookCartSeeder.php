<?php

namespace Database\Seeders;

use App\Models\UsedBook;
use App\Models\UsedBookCart;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsedBookCartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::where('permission', 1)->get();

        foreach ($users as $user) {
            for ($i = 0; $i < 3; $i++) {
                $used_books = UsedBook::whereNot('user_id', $user)->get();
                UsedBookCart::create([
                    'user_id' => $user->id,
                    'used_book_id' => $used_books->random()->id,
                ]);
            }
        }
    }
}
