<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use App\Models\About;

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

    public function downloadCv()
    {
        $cv = About::find(1)->cv;
        $filepath = public_path('cv/').$cv;
        return Response::download($filepath);
    }
}
