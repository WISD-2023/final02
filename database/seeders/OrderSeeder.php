<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\UsedBook;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $users = User::where('permission', 1)->get();

        foreach ($users as $user) {
            $existingOrderIds = OrderDetail::pluck('used_book_id')->toArray();
            $usedBooks = UsedBook::where('status', 1)
                ->whereNot('user_id', $user->id)
                ->whereNot('id', $existingOrderIds)
                ->get();
            $usedBook = $usedBooks->random();

            Order::create([
                'user_id' => $user->id,
                'pay_type' => $usedBook->pay_type,
                'trade_place' => $usedBook->trade_place,
                'payment' => true,
                'trade_at' => $usedBook->trade_at,
            ]);

            OrderDetail::create([
                'order_id' => Order::latest()->first()->id,
                'used_book_id' => $usedBook->id,
            ]);

        }
    }
}
