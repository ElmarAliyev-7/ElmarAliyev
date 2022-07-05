<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view('front.auth.register');
    }

    public function registerPost(Request $request)
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

                return redirect()->back()->with('error', 'This email already exists'); //$e->getMessage()
            }
        }
    }
}
