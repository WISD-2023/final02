<?php

namespace Database\Seeders;

use App\Models\TeachingMaterial;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeachingMaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TeachingMaterial::factory(10) -> create();
    }
}
