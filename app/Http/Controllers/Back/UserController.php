<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create(Request $request)
    {
        if ($request->isMethod('post'))
        {
            if ($request->password != $request->password_confirmation) {
                return redirect()->back()->with('error', 'Password doesn\'t match');
            } else {
                $validated = $request->validate([
                    'name'     => 'required|max:15',
                    'surname'  => 'required|max:15',
                    'username' => 'required|max:20|unique:users,username',
                    'email'    => 'max:50|unique:users,email',
                ]);
                try {
                    User::create([
                        'name'     => $validated['name'],
                        'surname'  => $validated['surname'],
                        'username' => $validated['username'],
                        'role_id'  => $request['role_id'],
                        'email'    => $validated['email'],
                        'password' => Hash::make($request->password),
                    ]);

                    return redirect()->back()->with('success', 'User register successfully');
                } catch (\Exception $e) {
                    return redirect()->back()->with('error', $e->getMessage());
                }
            }
        }
        if ($request->isMethod('get'))
        {
            if (auth()->user()->username == "admin") {
                $roles = Role::where('name', '!=', 'admin')->orderBy('id', 'DESC')->get();
            } else {
                $roles = Role::where('name', 'Standart user')->orderBy('id', 'DESC')->get();
            }
            return view('back.users.create', compact('roles'));
        }
    }

    public function update(Request $request, $id)
    {
        if ($request->isMethod('post'))
        {
            $user = User::findOrFail($id);
            if($id == 1)
                return abort(403,'You can\'t update Superadmin');
            if($user->role_id == auth()->user()->role_id)
                return abort(403,'Moderator doesn\'t edit the other moderator');

            try {
                $user->update([
                    'name' => $request->name,
                    'surname' =>$request->surname,
                    'username' => $request->username,
                    'role_id'  => $request->role_id,
                    'email'    => $request->email
                ]);

                return redirect()->back()->with('success', 'User updated successfully');
            } catch (\Exception $exception) {
                return redirect()->back()->with('error', $exception->getMessage());
            }
        }
        if ($request->isMethod('get'))
        {
            $user = User::find($id);
            if($id == 1){
                abort(403,'You can\'t update Superadmin');
            }
            if($user->role_id == auth()->user()->role_id){
                return abort(403,'Moderator doesn\'t edit the other moderator');
            }

            if (auth()->user()->id === 1) {
                $roles = Role::where('name', '!=', 'admin')->orderBy('id', 'DESC')->get();
            } else {
                $roles = Role::find(3); // Standart user
            }
            return view('back.users.update', compact('user', 'roles'));
        }
    }

    public function delete($id)
    {
        if ($id == 1) {
            return abort(403, 'USER DOES NOT HAVE THE RIGHT PERMISSIONS.');
        }
        User::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'User deleted successfully');
    }
}
