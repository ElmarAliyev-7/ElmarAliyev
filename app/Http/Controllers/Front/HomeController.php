<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('front.home');
    }

    public function about()
    {
        return view('front.pages.about');
    }

    public function projects()
    {
        return view('front.pages.projects');
    }

    public function blogs()
    {
        return view('front.pages.blogs');
    }

    public function contact()
    {
        return view('front.pages.contact');
    }

    public function register()
    {
        return view('front.auth.register');
    }

    public function registerPost(Request $request)
    {
        return $request;
    }
}
