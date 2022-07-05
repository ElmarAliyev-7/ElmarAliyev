<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function create()
    {
        return view('back.users.create');
    }

    public function createPost(Request $request)
    {
        return $request;
    }

    public function edit($id)
    {
        return $id;
    }

    public function delete($id)
    {
        if ($id == 1) {
            return abort(403, 'USER DOES NOT HAVE THE RIGHT PERMISSIONS.');
        }
        User::find($id)->delete();
        return redirect()->back()->with('success', 'User deleted successfully');
    }
}
