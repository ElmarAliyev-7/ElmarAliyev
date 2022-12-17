<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\Task;
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
        $task_count = Task::count();
        $project_count = Portfolio::count();
        $message_count = Message::count();
        return view('back.dashboard', compact('user_count', 'blog_count',
            'task_count', 'project_count', 'message_count'));
    }

    public function users()
    {
        $users = User::with('role')->where('id', '!=', 1)->paginate(10);
        $roles = Role::get();
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
        $projects = Portfolio::orderBy('order', 'ASC')->get();
        return view('back.portfolio.index',compact('projects'));
    }

    public function blog()
    {
        $blogs = Blog::all();
        return view('back.blogs.index',compact('blogs'));
    }

    public function task()
    {
        $tasks = Task::with('questions')->get();
        return view('back.tasks.index',compact('tasks'));
    }

    public function messages()
    {
        $messages = Message::paginate(10);
        return view('back.messages.index',compact('messages'));
    }

    public function permissions()
    {
        $roles = Role::with('permissions')->orderBy('id','ASC')->get();
        return view('back.permissions.index', compact('roles'));
    }
}
