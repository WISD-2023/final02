<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this -> call(
            [
                PermissionSeeder::class, //權限組
                PaymentMethodSeeder::class, //付款方式
                TransactionLocationSeeder::class, //交易地點
                CategorySeeder::class, //中文圖書分類法

                UserSeeder::class, //使用者帳號
                UsedBookCartSeeder::class, //二手書購物車
                OrderSeeder::class, //二手書
                NewBookSeeder::class, //新書
                TeachingMaterialSeeder::class, //教材
                NewBookCartSeeder::class, //新書購物車
                NewBookCartsItemSeeder::class, //新書購物車項目
                NewBookCartsMemberSeeder::class, //新書購物車成員
                SchoolOrderSeeder::class, //學校訂單
            ]
        );

    }
}
