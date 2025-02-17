<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function __invoke()
    {
        $permissions = Permission::all();

        return view('permission.index', compact('permissions'));
    }
}
