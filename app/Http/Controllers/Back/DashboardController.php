<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use App\Models\MySkill;
use App\Models\User;
use App\Models\Role;
use App\Models\HomePage;
use App\Models\About;
use App\Models\Experience;
use App\Models\Message;
use App\Models\Blog;

class DashboardController extends Controller
{
    public function index()
    {
        $user_count = User::count();
        $blog_count = Blog::count();
        $project_count = Portfolio::count();
        $message_count = Message::count();
        return view('back.dashboard', compact('user_count', 'blog_count',
            'project_count', 'message_count'));
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
        $experiences = Experience::all();
        return view('back.experience.index', compact('experiences'));
    }

    public function portfolio()
    {
        $projects = Portfolio::all();
        return view('back.portfolio.index',compact('projects'));
    }

    public function blog()
    {
        $blogs = Blog::all();
        return view('back.blogs.index',compact('blogs'));
    }

    public function messages()
    {
        $messages = Message::paginate(10);
        return view('back.message',compact('messages'));
    }

    public function permissions()
    {
        $roles = Role::select('id', 'name')->where('id', '!=', 1)->get();
        return view('back.permissions.index', compact('roles'));
    }
}
