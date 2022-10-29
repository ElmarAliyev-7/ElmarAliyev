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
            $fieldType = filter_var($request->username_or_email, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

            $auth = Auth::attempt([
                $fieldType => $request->username_or_email,
                'password' => $request->password,
                'role'     => function ($query) {
                    $query->where('role_id', '!=', 3); // Standart user can't login to admin panel
                }
            ]);

            if ($auth) {
                return redirect()->route('admin.dashboard')
                    ->with('success', 'Welcome '.Auth::user()->name.' '.Auth::user()->surname);
            }

            return redirect()->back()->with('error', 'İstifadəçi adı və ya parol səhvdir');
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
