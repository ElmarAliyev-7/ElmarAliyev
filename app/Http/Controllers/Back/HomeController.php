<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomePage;
use App\Models\About;
use Illuminate\Support\Facades\File;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $data = HomePage::find(1);

        $data->title      = $request->title;
        $data->subtitle   = $request->subtitle;
        $data->duty       = $request->duty;

        try {
            if ($files = $request->file('background')) {
                request()->validate([
                    'background' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
                $image_path = public_path($data->background);
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }
                $destinationPath = public_path('/images/');
                $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
                $files->move($destinationPath, $profileImage);
                $data->background = 'images/' . $profileImage;
            }
            $data->save();
            return redirect()->back()->with("success", "HomePage's data updated successfully");
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        };
    }

    public function about(Request $request)
    {
        $data = About::find(1);

        $data->fullname    = $request->fullname;
        $data->duty        = $request->duty;
        $data->description = $request->description;
        $data->from        = $request->from;
        $data->lives_in    = $request->lives_in;
        $data->age         = $request->age;
        $data->gender      = $request->gender;

        try {
            if ($files = $request->file('cv')) {
                request()->validate([
                    'cv' => 'required|mimes:pdf|max:10000',
                ]);
                if (File::exists($data->cv)) {
                    File::delete($data->cv);
                }
                $cv_destinationPath = public_path('cv/');
                $cv_profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
                $files->move($cv_destinationPath, $cv_profileImage);
                $data->cv = public_path('cv/').$cv_profileImage;
            }

            if ($files = $request->file('image')) {
                request()->validate([
                    'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
                $image_path = public_path($data->image);
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }
                $destinationPath = public_path('/images/');
                $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
                $files->move($destinationPath, $profileImage);
                $data->image = 'images/' . $profileImage;
            }
            $data->save();
            return redirect()->back()->with("success", "AboutPage's data updated successfully");
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        };
    }
}
