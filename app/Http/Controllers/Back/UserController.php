<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create()
    {
        if (auth()->user()->username == "admin") {
            $roles = Role::where('name', '!=', 'admin')->orderBy('id', 'DESC')->get();
        } else {
            $roles = Role::where('name', 'Standart user')->orderBy('id', 'DESC')->get();
        }
        return view('back.users.create', compact('roles'));
    }

    public function createPost(RegisterRequest $request)
    {
        if ($request->password != $request->password_confirmation) {
            return redirect()->back()->with('error', 'Password doesn\'t match');
        } else {
            try {
                $user = new User;
                $user->name     = $request->name;
                $user->surname  = $request->surname;
                $user->username = $request->username;
                $user->role_id  = $request->role_id;
                $user->email    = $request->email;
                $user->password = Hash::make($request->password);
                $user->save();

                return redirect()->back()->with('success', 'User register successfully');
            } catch (\Exception $e) {

                return redirect()->back()->with('error', $e->getMessage());
            }
        }
    }

    public function update($id)
    {
        $user = User::find($id);
        if (auth()->user()->id === 1) {
            $roles = Role::where('name', '!=', 'admin')->orderBy('id', 'DESC')->get();
        } else {
            $roles = Role::find(3); // Standart user
        }
        return view('back.users.update', compact('user', 'roles'));
    }

    public function updatePost(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name     = $request->name;
        $user->surname  = $request->surname;
        $user->username = $request->username;
        $user->role_id  = $request->role_id;
        $user->email    = $request->email;
        $user->save();

        return redirect()->back()->with('success', 'User updated successfully');
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
