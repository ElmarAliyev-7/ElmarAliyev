<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\HomePage;

class DashboardController extends Controller
{
    public function index()
    {
        $user_count = User::count();
        return view('back.dashboard', compact('user_count'));
    }

    public function home()
    {
        $data = HomePage::find(1);
        return view('back.home', compact('data'));
    }

    public function users()
    {
        $users = User::where('username', '!=', 'admin')->paginate(10);
        $roles = Role::select('id', 'name')->get();
        return view('back.users.index', compact('users', 'roles'));
    }

    public function permissions()
    {
        $roles = Role::select('id', 'name')->where('name', '!=', 'admin')->get();
        return view('back.permissions.index', compact('roles'));
    }
}
