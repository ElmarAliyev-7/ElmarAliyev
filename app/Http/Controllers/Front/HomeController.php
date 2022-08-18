<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use App\Models\About;
use App\Models\Portfolio;
use App\Models\HomePage;
use App\Models\MySkill;
use App\Models\Experience;
use App\Models\Message;

class HomeController extends Controller
{
    public function index()
    {
        $home_page = HomePage::find(1);
        $home_subtitle_array = explode(" ", $home_page->subtitle);
        $about = About::find(1);
        $skills = MySkill::where('parent_id',0)->get();
        $educations = Experience::where('work_time',null)->orderBy('end', 'desc')->get();
        $experiences = Experience::where('work_time', '!=', null)->orderBy('id', 'desc')->get();
        $projects = Portfolio::orderBy('order','desc')->get();

        return view('front.home',
            compact('home_page','home_subtitle_array' ,'about' , 'skills',
            'educations', 'experiences' ,'projects'));
    }

    public function blogs()
    {
        return view('front.blogs');
    }

    public function contact(Request $request)
    {
        $message = new Message;
        $message->name    = $request->name;
        $message->email   = $request->email;
        $message->subject = $request->subject;
        $message->message = $request->message;
        try{
            $message->save();
            return response()->json(['success'=>'Successfully']);
        }catch (\Exception $exception){
            return response()->json(['error'=>$exception]);
        }
    }

    public function downloadCv()
    {
        $filepath = About::find(1)->cv;
        return Response::download($filepath);
    }
}
