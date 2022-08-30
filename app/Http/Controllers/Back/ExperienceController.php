<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function create(Request $request)
    {
        if ($request->isMethod('post'))
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
        if ($request->isMethod('get'))
        {
            return view('back.experience.create');
        }
    }

    public function update(Request $request, $id){
        if ($request->isMethod('post'))
        {
            $experience = Experience::findOrFail($id);
            $experience->company_name = $request->company_name;
            $experience->duty         = $request->duty;
            $experience->start        = $request->start;
            $experience->end          = $request->end;
            $experience->work_time    = $request->work_time;
            $experience->type         = $request->type;
            $experience->save();
            return redirect()->back()->with('success', 'Updated successfully!');
        }
        if ($request->isMethod('get'))
        {
            $experience = Experience::where('id', $id)->first();
            return view('back.experience.update',compact('experience'));
        }
    }

    public function delete($id)
    {
        Experience::find($id)->delete();
        return redirect()->back()->with('success', 'Deleted successfully');
    }
}
