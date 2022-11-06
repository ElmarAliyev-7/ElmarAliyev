<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class TaskController extends Controller
{
    public function create(Request $request)
    {
        if ($request->isMethod('post'))
        {
            $task = new Task;

            $task->title       = $request->title;
            $task->slug        = Str::slug($request->title);
            $task->description = $request->description;

            try {
                if ($files = $request->file('image')) {
                    request()->validate([
                        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    ]);
                    $image_path = public_path('task-images'.$task->image);
                    if (File::exists($image_path)) {
                        File::delete($image_path);
                    }
                    $destinationPath = public_path('/task-images/');
                    $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
                    $files->move($destinationPath, $profileImage);
                    $task->image = 'task-images/' . $profileImage;
                }
                $task->save();
                return redirect()->back()->with("success", "Task created successfully");
            } catch (\Exception $exception) {
                return redirect()->back()->with('error', $exception->getMessage());
            }
        }
        if ($request->isMethod('get'))
        {
            return view('back.tasks.create');
        }
    }
}