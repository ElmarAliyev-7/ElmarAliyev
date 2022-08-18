<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function create()
    {
        return view('back.experience.create');
    }

    public function createPost(Request $request)
    {
        $experience = new Experience;

        $experience->company_name = $request->company_name;
        $experience->duty         = $request->duty;
        $experience->start        = $request->start;
        $experience->end          = $request->end;
        $experience->work_time    = $request->work_time;
        $experience->type         = $request->type;
        $experience->save();
        return redirect()->back()->with('success', 'Added successfully!');
    }

    public function delete($id)
    {
        Experience::find($id)->delete();
        return redirect()->back()->with('success', 'Deleted successfully');
    }
}
