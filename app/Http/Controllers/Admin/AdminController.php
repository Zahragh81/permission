<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $admins = Admin::all();

        return view('admin.admin.index', compact('admins'));
    }


    public function create()
    {
        $users = User::whereDoesntHave('roles', function ($role) {
            $role->where('role_group_id', 1);
        })->get();

        $admin_roles = Role::where('role_group_id', 1)->get();

        return view('admin.admin.craete', compact('users', 'admin_roles'));
    }


    public function store(Request $request)
    {
        $user = User::find($request->user_id);

        $role_ids = array_map(function ($role_id) {
            return +$role_id;
        }, $request->roles);

        $user->assignRole($role_ids);

        return to_route('admin.index');
    }


    public function edit(Admin $admin)
    {
        $admin_roles = Role::where('role_group_id', 1)->get();

        $roles_ids = $admin->roles()->pluck('id')->toArray();

        return view('admin.admin.edit', compact('admin', 'admin_roles', 'roles_ids'));
    }


    public function update(Request $request, Admin $admin)
    {
        $role_ids = array_map(function ($role_id) {
            return +$role_id;
        }, $request->roles);

        $admin->roles()->detach(Role::where('role_group_id', 1)->pluck('id'));

        $admin->assignRole($role_ids);

        return to_route('admin.index');
    }


    public function destroy(Admin $admin)
    {
        $admin->roles()->detach(Role::where('role_group_id', 1)->pluck('id'));

        return to_route('admin.index');
    }
}
