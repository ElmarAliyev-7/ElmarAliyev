<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use App\Models\About;
use App\Models\Portfolio;
use App\Models\MySkill;
use App\Models\Experience;
use App\Models\Blog;
use App\Models\Task;
use App\Models\Message;
use Illuminate\Support\Facades\Mail;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class HomeController extends Controller
{
    public function index()
    {
        $about       = About::find(1);
        $skills      = MySkill::with('childs')->get();
        $projects    = Portfolio::orderBy('order','asc')->take(8)->get();
        $tasks       = Task::take(4)->get();
        $blogs       = Blog::orderBy('id','desc')->take(4)->get();
        $educations  = Experience::where('type',1)->orderBy('id', 'desc')->get();
        $all_exps    = Experience::where('type',0)->orderBy('id', 'desc')->get();

        $experiences = array();
        foreach($all_exps as $key => $experience)
        {
            $experiences[$experience->company_name] = Experience::where('company_name', $experience->company_name)
            ->orderBy('id', 'DESC')->get();
        }

        return view('front.home',
            compact('about' , 'skills', 'educations', 'experiences' ,'projects', 'tasks','blogs'));
    }

    public function blogs()
    {
        $blogs = Blog::all();
        return view('front.blogs', compact('blogs'));
    }

    public function blog($slug)
    {
        Blog::where('slug',$slug)->increment('reads',1);
        $blog = Blog::where('slug',$slug)->first();
        return view('front.single-blog', compact('blog'));
    }


    public function projects()
    {
        $projects = Portfolio::all();
        return view('front.projects', compact('projects'));
    }

    public function tasks()
    {
        $tasks = Task::with('questions')->get();
        return view('front.tasks', compact('tasks'));
    }

    public function task($slug)
    {
        $task = Task::where('slug',$slug)->first();
        return view('front.single-task', compact('task'));
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
            return redirect()->back()->with('success', 'Message Sended Successfully');
        }catch (\Exception $exception){
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function downloadCv()
    {
        $filepath = About::find(1)->cv;
        return Response::download($filepath);
    }
}
