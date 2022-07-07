<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomePage;
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
                $image_path = public_path("images/$data->background");
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
}
