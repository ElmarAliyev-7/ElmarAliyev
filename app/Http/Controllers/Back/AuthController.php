<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('back.auth.login');
    }

    public function loginPost(Request $request)
    {
        $auth = Auth::guard('admins')->attempt($request->only(['name', 'password']));

        if ($auth) {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('admin.login')->with('error', 'İstifadəçi adı və ya parol səhvdir');
    }

    public function logOut()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
