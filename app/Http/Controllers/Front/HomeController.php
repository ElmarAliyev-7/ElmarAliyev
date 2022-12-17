<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use App\Models\{
    About,
    Portfolio,
    MySkill,
    Experience,
    Blog,
    Task,
    Message,
    UserQuestion,
};

use Illuminate\Support\Facades\Mail;

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
        return view('front.blogs.index', compact('blogs'));
    }

    public function blog($slug)
    {
        Blog::where('slug',$slug)->increment('reads',1);
        $blog = Blog::where('slug',$slug)->first();
        return view('front.blogs.show', compact('blog'));
    }


    public function projects()
    {
        $projects = Portfolio::all();
        return view('front.projects.index', compact('projects'));
    }

    public function tasks()
    {
        $tasks = Task::with('questions')->get();
        return view('front.tasks.index', compact('tasks'));
    }

    public function task($slug)
    {
        $task = Task::with('questions')->where('slug',$slug)->first();

        $questionIds = Task::query()
            ->select('q.id')
            ->from('tasks as t')
            ->where('t.id', $task->id)
            ->leftJoin('questions as q', 'q.task_id', 't.id')
            ->get()->pluck('id');

        $answers = UserQuestion::query()
            ->select('question_id')
            ->where('user_id', Auth::guard('site')->user()->id)
            ->whereIn('question_id', $questionIds)
            ->get()->pluck('question_id');

        $percent = (count($answers)/ count($questionIds))*100;
        $answers = json_decode(json_encode($answers), true);

        return view('front.tasks.show', compact('task','answers','percent'));
    }

    public function learnQuestion(Request $request)
    {
        UserQuestion::create($request->all());
        return redirect()->back()->with('success', 'Question Checked');
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
            Mail::send('front.mail.index', $data, function($m) use ($email) {
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
