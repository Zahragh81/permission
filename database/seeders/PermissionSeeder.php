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
        $permissions = [
            // Dashboard
            ['name' => 'dashboard', 'title' => 'داشبورد', 'permission_group_id' => 1],

            // User
            ['name' => 'user_index', 'title' => 'فهرست کاربران', 'permission_group_id' => 2],
            ['name' => 'user_create', 'title' => 'ایجاد کاربران', 'permission_group_id' => 2],
            ['name' => 'user_show', 'title' => 'مشاهده کاربران', 'permission_group_id' => 2],
            ['name' => 'user_edit', 'title' => 'ویرایش کاربران', 'permission_group_id' => 2],
            ['name' => 'user_destroy', 'title' => 'حذف کاربران', 'permission_group_id' => 2],
        ];

        foreach ($permissions as $permission) Permission::create($permission);
    }
}
