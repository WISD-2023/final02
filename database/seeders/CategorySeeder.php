<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //中文圖書分類陣列
        $categories = require(database_path('seeders/CategoriesDate/Date.php'));

        foreach ($categories as $category) {
            Category::create([
                'ccl_id' => $category[0],
                'name' => $category[1],
            ]);
        }
    }
}
