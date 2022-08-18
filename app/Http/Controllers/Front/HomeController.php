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
use Illuminate\Support\Facades\Mail;

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
        $projects = Portfolio::orderBy('order','asc')->get();

        return view('front.home',
            compact('home_page','home_subtitle_array' ,'about' , 'skills',
            'educations', 'experiences' ,'projects'));
    }

    public function contact(Request $request)
    {
        $new_message  = new Message;
        $new_message->name    = $request->name;
        $new_message->email   = $request->email;
        $new_message->subject = $request->subject;
        $new_message->message = $request->message;
        try{
            $data = [
                'name'   => $request->name,
                'email'  => $request->email,
                'subject'=> $request->subject,
                'msg'    => $request->message,
            ];
            $email = $request->email;
            Mail::send('front.mail', $data, function($m) use ($email) {
                $m->from(env('MAIL_FROM_ADDRESS'), env('APP_NAME'));
                $m->to(env('MAIL_USERNAME'), env('MAIL_FROM_NAME') )->subject($email);
            });
            $new_message->save();
            return response()->json(['success'=>'Message Sended Successfully']);
        }catch (\Exception $exception){
            return response()->json(['error'=> $exception->getMessage()]);
        }
    }

    public function downloadCv()
    {
        $filepath = About::find(1)->cv;
        return Response::download($filepath);
    }
}
