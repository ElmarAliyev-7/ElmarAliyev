<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\MySkill;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\HomePage;
use App\Models\About;

class DashboardController extends Controller
{
    public function index()
    {
        $user_count = User::count();
        return view('back.dashboard', compact('user_count'));
    }

    public function users()
    {
        $users = User::where('username', '!=', 'admin')->paginate(10);
        $roles = Role::select('id', 'name')->get();
        return view('back.users.index', compact('users', 'roles'));
    }

    public function home()
    {
        $data = HomePage::find(1);
        return view('back.home', compact('data'));
    }

    public function about()
    {
        $data = About::find(1);
        return view('back.about', compact('data'));
    }

    public function skills()
    {
        $skills = MySkill::paginate(10);
        return view('back.my-skills.index',compact('skills'));
    }

    public function experience()
    {
        return view('back.experience.index');
    }

    public function permissions()
    {
        $roles = Role::select('id', 'name')->where('name', '!=', 'admin')->get();
        return view('back.permissions.index', compact('roles'));
    }
}
