<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\PermissionGroup;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::whereRoleGroupId(1)->get();

        return view('admin.role.index', compact('roles'));
    }


    public function create()
    {
        $permissionGroups = PermissionGroup::all();

        return view('admin.role.create', compact('permissionGroups'));
    }


    public function store(Request $request)
    {
        $permission_ids = array_map(function ($permission_id) {
            return +$permission_id;
        }, $request->permissions ?? []);

        $inputs = $request->all();
        $inputs['role_group_id'] = 1;

        $role = Role::create($inputs);

        $role->syncPermissions($permission_ids);

        return to_route('role.index');
    }


    public function edit(Role $role)
    {
        $permissionGroups = PermissionGroup::all();

        $role_permission_ids = $role->permissions()->pluck('id')->toArray();

        return view('admin.role.edit', compact('role', 'permissionGroups', 'role_permission_ids'));
    }


    public function update(Request $request, Role $role)
    {
        $role->update($request->all());

        $permission_ids = array_map(fn ($permission_id) => (int) $permission_id, $request->permissions ?? []);

        $role->syncPermissions($permission_ids);

        return to_route('role.index');
    }
}
