<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(Request $request)
    {
        if ($request->isMethod('post'))
        {
            if ($request->password != $request->password_confirmation) {
                return redirect()->back()->with('error', 'Password doesn\'t match');
            } else {
                try {
                    $user = new User;
                    $user->name     = $request->name;
                    $user->surname  = $request->surname;
                    $user->username = $request->username;
                    $user->email    = $request->email;
                    $user->password = Hash::make($request->password);
                    $user->save();

                    return redirect()->back()->with('success', 'User register successfully');
                } catch (\Exception $e) {

                    return redirect()->back()->with('error', $e->getMessage());
                }
            }
        }

        if($request->isMethod('get'))
        {
            return view('front.auth.register');
        }
    }

    public function login(Request $request){
        $username = $request->username;
        $password = $request->password;
        $user     = User::where('username', $username)->first();

        if($user){
            if($user->role_id == 3){
                $auth = Auth::guard('site')->attempt([
                    'username' => $username,
                    'password' => $password
                ]);
                if ($auth) {
                    return redirect()->route('profile')->with('success', 'Xoşgəldiniz !');
                }
            }else{
                $auth = Auth::attempt([
                    'username' => $username,
                    'password' => $password
                ]);
                if ($auth) {
                    return redirect()->route('admin.dashboard');
                }
            }
        }else{
            return redirect()->route('register')->with('error', 'İstifadəçi adı və ya parol səhvdir');
        }
    }

    public function profile()
    {
        return view('front.auth.profile');
    }

    public function logOut()
    {
        Auth::guard('site')->logout();
        return redirect()->route('home');
    }
}
