<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\MySkill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function create()
    {
        $skills = MySkill::select('id','name','parent_id')->get();
        return view('back.my-skills.create',compact('skills'));
    }

    public function createPost(Request $request)
    {
        $skill = new MySkill;
        $skill->name      = $request->skill;
        $parent_id        = $request->parent_id != null ? $request->parent_id  : 0;
        $skill->parent_id = $parent_id;
        $skill->percent   = $request->percent;
        $skill->save();
        return redirect()->back()->with('success','Skill added successfully!');
    }

    public function delete($id)
    {
        $skill = MySkill::find($id);
        if($skill->parent_id == 0)
        {
            MySkill::where('parent_id',$id)->update(['parent_id' => 0]);
        }
        MySkill::find($id)->delete();
        return redirect()->back()->with('success', 'Skill deleted successfully');
    }
}
