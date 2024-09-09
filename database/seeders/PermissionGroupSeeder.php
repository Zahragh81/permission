<?php

namespace Database\Seeders;

use App\Models\PermissionGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissionGroupNames = [
            'داشبورد',
            'کاربران'
        ];

        foreach ($permissionGroupNames as $name) PermissionGroup::create(['name' => $name]);
    }
}
