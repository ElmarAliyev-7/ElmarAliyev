<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if ($request->isMethod('post'))
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
                return redirect()->route('admin.dashboard')
                    ->with('success', 'Welcome '.Auth::user()->name.' '.Auth::user()->surname);
            }

            return redirect()->route('admin.login')->with('error', 'İstifadəçi adı və ya parol səhvdir');
        }
        if ($request->isMethod('get'))
        {
            return view('back.auth.login');
        }
    }

    public function logOut()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
