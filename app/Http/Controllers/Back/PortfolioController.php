<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portfolio;
use Illuminate\Support\Facades\File;

class PortfolioController extends Controller
{
    public function create(Request $request)
    {
        if ($request->isMethod('post'))
        {
            try {
                $project = Portfolio::create([
                    'title'   => $request->title,
                    'comment' => $request->comment,
                    'program' => $request->program,
                ]);

                if ($files = $request->file('image')) {
                    request()->validate([
                        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    ]);
                    $image_path = public_path($project->image);
                    if (File::exists($image_path)) {
                        File::delete($image_path);
                    }
                    $destinationPath = public_path('/images/');
                    $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
                    $files->move($destinationPath, $profileImage);
                    $project->update(['image' => 'images/' . $profileImage]);
                }
                return redirect()->back()->with("success", "Project added successfully");
            } catch (\Exception $exception) {
                return redirect()->back()->with('error', $exception->getMessage());
            };
        }
        if ($request->isMethod('get'))
        {
            return view('back.portfolio.create');
        }
    }

    public function update(Request $request, $id)
    {
        if ($request->isMethod('post'))
        {
            try {
                $project = Portfolio::findOrFail($id);

                $project->update([
                    'title'    => $request->title,
                    'comment'  => $request->comment,
                    'program'  => $request->program,
                ]);

                if ($files = $request->file('image')) {
                    request()->validate([
                        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    ]);
                    $image_path = public_path($project->image);
                    if (File::exists($image_path)) {
                        File::delete($image_path);
                    }
                    $destinationPath = public_path('/images/');
                    $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
                    $files->move($destinationPath, $profileImage);
                    $project->update(['image' => 'images/' . $profileImage ]);
                }
                return redirect()->back()->with('success', 'Project updated successfully');
            } catch (\Exception $exception) {
                return redirect()->back()->with('error', $exception->getMessage());
            }
        }
        if ($request->isMethod('get'))
        {
            $project = Portfolio::find($id);
            return view('back.portfolio.update',compact('project'));
        }
    }

    public function delete($id)
    {
        $project = Portfolio::find($id);
        $image_path = public_path($project->image);
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        $project->delete();
        return redirect()->back()->with('success', 'Deleted successfully');
    }

    public function sort(Request $request)
    {
        foreach($request->sorts as $order => $id) {
            Portfolio::where('id', $id)->update(['order' => $order]);
        }
    }

}
