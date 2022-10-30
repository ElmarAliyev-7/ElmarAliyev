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
            try {
                $experience = Experience::create([
                    'company_name' =>   $request->company_name,
                    'duty'         =>   $request->duty,
                    'start'        =>   $request->start,
                    'end'          =>   $request->end,
                    'work_time'    =>   $request->work_time,
                    'type'         =>   $request->type,
                ]);

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
                    $experience->update(['image' => 'images/' . $profileImage]);
                }

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
        if ($request->isMethod('put'))
        {
            try {
                $experience = Experience::findOrFail($id);

                $experience->update([
                    'company_name' =>   $request->company_name,
                    'duty'         =>   $request->duty,
                    'start'        =>   $request->start,
                    'end'          =>   $request->end,
                    'work_time'    =>   $request->work_time,
                    'type'         =>   $request->type
                ]);

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
                    $experience->update(['image' => 'images/' . $profileImage]);
                }
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
        $experience = Experience::find($id);
        if (File::exists($experience->image)) {
            File::delete($experience->image);
        }

        $experience->delete();
        return redirect()->back()->with('success', 'Deleted successfully');
    }
}
