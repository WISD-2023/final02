<?php

namespace Database\Seeders;

use App\Models\NewBook;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        NewBook::factory(20) -> create();
    }
}
