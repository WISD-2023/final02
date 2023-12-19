<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [ '會員', '校方', '教師', '平台人員'];
        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission,
            ]);
        }
    }
}
