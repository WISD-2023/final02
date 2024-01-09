<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //建立5個會員帳號 permission：1 各有一帳戶 三個未售出二手書籍 一個售出二手書籍
        User::factory()
            ->hasAccountInfo()
            ->hasUsedBook(3)
            ->hasUsedBook([
                'status' => 1,
            ])
            ->create([
                'email' => 'user@localhost',
            ]);
        User::factory(4)
            ->hasAccountInfo()
            ->hasUsedBook(3)
            ->hasUsedBook([
                'status' => 1,
            ])
            ->create();

        //建立1個校方帳號 各有一帳戶
        User::factory(1)->hasAccountInfo()->create([
            'email' => 'school@localhost',
            'permission' => 1,
        ]);

        //建立5個教師帳號 各有一帳戶
        User::factory(1)->hasAccountInfo()->hasTeacherAuths()->create([
            'email' => 'teach@localhost',
            'permission' => 3,
        ]);

        User::factory(4)->hasAccountInfo()->hasTeacherAuths()->create([
            'permission' => 3,
        ]);

        //建立1個管理員帳號 各有一帳戶
        User::factory(1)->hasAccountInfo()->create([
            'email' => 'admin@localhost',
            'permission' => 4,
        ]);
    }
}
