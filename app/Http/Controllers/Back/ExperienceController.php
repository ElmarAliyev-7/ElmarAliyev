<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
            try {
                if ($files = $request->file('image')) {
                    request()->validate([
                        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    ]);
                    $image_path = public_path($experience->image);
                    if (File::exists($image_path)) {
                        File::delete($image_path);
                    }
                    $destinationPath = public_path('/images/');
                    $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
                    $files->move($destinationPath, $profileImage);
                    $experience->image = 'images/' . $profileImage;
                }
                $experience->save();
                return redirect()->back()->with('success', 'Added successfully!');
            } catch (\Exception $exception) {
                return redirect()->back()->with('error', $exception->getMessage());
            }
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
            try {
                if ($files = $request->file('image')) {
                    request()->validate([
                        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    ]);
                    $image_path = public_path($experience->image);
                    if (File::exists($image_path)) {
                        File::delete($image_path);
                    }
                    $destinationPath = public_path('/images/');
                    $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
                    $files->move($destinationPath, $profileImage);
                    $experience->image = 'images/' . $profileImage;
                }
                $experience->save();
                return redirect()->back()->with('success', 'Updated successfully!');
            } catch (\Exception $exception) {
                return redirect()->back()->with('error', $exception->getMessage());
            }
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
