<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\UserQuestion;
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

        if($request->isMethod('post'))
        {
            $username = $request->username;
            $password = $request->password;
            $user     = User::where('username', $username)->first();
            if($user){
                if($user->role_id == 3){
                    $auth = Auth::guard('site')->attempt(['username' => $username, 'password' => $password]);
                    if ($auth){
                        toastr()->success('Xoşgəldiniz '. $user->name .' '. $user->surname);
                        return view('front.auth.profile', compact('user'));
                    }
                    return redirect()->route('register')->with('error', 'İstifadəçi adı və ya parol səhvdir');
                }else{
                    $auth = Auth::attempt([
                        'username' => $username,
                        'password' => $password
                    ]);
                    if ($auth)
                        return redirect()->route('admin.dashboard');
                }
            }
            return redirect()->route('register')->with('error', 'İstifadəçi adı və ya parol səhvdir');
        }

        if($request->isMethod('get'))
        {
            return view('front.auth.register');
        }

    }

    public function profile()
    {
        $user = Auth::guard('site')->user();

        $tasks = UserQuestion::query()
            ->select('*')
            ->where('user_id', Auth::guard('site')->user()->id)
            ->leftJoin('questions as q','q.id','question_id')
            ->leftJoin('tasks as t','t.id','q.task_id')
            ->groupBy('t.id')
            ->get();

        return view('front.auth.profile', compact('user', 'tasks'));
    }

    public function logOut()
    {
        Auth::guard('site')->logout();
        return redirect()->route('home')->with('info', 'Logged Out');
    }

    public function updateProfile(Request $request, $id){
        $validated = $request->validate([
            'name'     => 'required|max:15',
            'surname'  => 'required|max:15',
            'username' => 'required|max:20',
            'email'    => 'max:50',
        ]);
        try {
            $user = User::find($id);
            $user->name     = $validated['name'];
            $user->surname  = $validated['surname'];
            $user->username = $validated['username'];
            $user->email    = $validated['email'];
            $user->save();
            return redirect()->back()->with('success', 'Updated successfully !');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function updatePassword(Request $request, $id){
        $user = User::find($id);
        if ($request->password != $request->password_confirmation) {
            return redirect()->back()->with('error', 'Password doesn\'t match');
        } else {
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::guard('site')->logout();
            return redirect()->route('register')->with('success','Password updated successfully');
        }
    }
}
