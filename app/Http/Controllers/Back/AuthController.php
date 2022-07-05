<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('back.auth.login');
    }

    public function loginPost(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        $auth = Auth::attempt([
            'username' => $username,
            'password' => $password,
            'role'     => function ($query) {
                $query->where('role_id', '!=', 3); // Standart user can't login to admin panel
            }
        ]);

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
