<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            // Admin
            ['name' => 'manager', 'title' => 'مدیر سیستم', 'role_group_id' => 1],
            ['name' => 'staff_manager', 'title' => 'مدیر ستادی', 'role_group_id' => 1],

            // Doctor
            ['name' => 'doctor', 'title' => 'پزشک', 'role_group_id' => 2],
        ];

        $permission_ids = Permission::pluck('id');

        foreach ($roles as $role) {
            $role = Role::create($role);

            if ($role->role_group_id == 1)
                $role->syncPermissions($permission_ids);
        }
    }
}
