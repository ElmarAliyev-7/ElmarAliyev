<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        return view('back.dashboard');
    }

    public function home()
    {
        return view('back.home');
    }

    public function users()
    {
        $users = User::paginate(20);
        return view('back.users.index', compact('users'));
    }
}
