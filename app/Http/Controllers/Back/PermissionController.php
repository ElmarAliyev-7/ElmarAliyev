<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;
use App\Models\RoleAndPermission;

class PermissionController extends Controller
{
    public function index(Request $request, $id)
    {
        if ($request->isMethod('post'))
        {
            $permissions = is_array($request->permissions) ? $request->permissions : [];
            RoleAndPermission::where('role_id', $id)->delete();

            foreach ($permissions as $permission) {
                RoleAndPermission::create([
                    'role_id'       => $id,
                    'permission_id' => intval($permission)
                ]);
            }
            return redirect()->route('admin.create-permission', $id)->with('success', 'Permission added successfully!');
        }

        if ($request->isMethod('get'))
        {
            if ($id == 1 || $id == 3) {
                return abort(404); // SuperAdmin and Standart User can't get permission
            }
            $role         = Role::findOrFail($id);
            $role_perms   = RoleAndPermission::where('role_id', $id)->get();
            $permissions  = Permission::all();
            return view('back.permissions.add-permission', compact('role', 'role_perms', 'permissions'));
        }
    }
}
