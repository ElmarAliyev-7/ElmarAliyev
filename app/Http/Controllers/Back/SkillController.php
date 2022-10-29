<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\MySkill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function create(Request $request)
    {
        if ($request->isMethod('post'))
        {
            MySkill::create([
                'name'      => $request->skill,
                'parent_id' => $request->parent_id != null ? $request->parent_id  : 0,
                'percent'   => $request->percent != null ? $request->percent  : 0
            ]);

            return redirect()->back()->with('success', 'Skill added successfully!');
        }
        if ($request->isMethod('get'))
        {
            $skills = MySkill::select('id', 'name', 'parent_id')->where('parent_id', 0)->get();
            return view('back.my-skills.create', compact('skills'));
        }
    }

    public function delete($id)
    {
        $skill = MySkill::find($id);
        if ($skill->parent_id == 0) {
            MySkill::where('parent_id', $id)->update(['parent_id' => 0]);
        }
        MySkill::find($id)->delete();
        return redirect()->back()->with('success', 'Skill deleted successfully');
    }
}
