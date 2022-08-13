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

    public function projects()
    {
        return view('front.projects');
    }

    public function blogs()
    {
        return view('front.blogs');
    }

    public function downloadCv()
    {
        $filepath = About::find(1)->cv;
        return Response::download($filepath);
    }
}
