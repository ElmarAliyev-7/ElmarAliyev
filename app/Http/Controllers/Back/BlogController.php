<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    public function create(Request $request)
    {
        if ($request->isMethod('post'))
        {
            $blog = new Blog;

            $blog->title       = $request->title;
            $blog->description = $request->description;
            $blog->slug        = Str::slug($request->title);
            $blog->link        = $request->link;

            try {
                if ($files = $request->file('image')) {
                    request()->validate([
                        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    ]);
                    $image_path = public_path('blog-images'.$blog->image);
                    if (File::exists($image_path)) {
                        File::delete($image_path);
                    }
                    $destinationPath = public_path('/blog-images/');
                    $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
                    $files->move($destinationPath, $profileImage);
                    $blog->image = 'blog-images/' . $profileImage;
                }
                if ($files = $request->file('video')) {
                    request()->validate([
                        'video' => 'mimes:mp4,ogx,oga,ogv,ogg,webm',
                    ]);
                    $video_path = public_path('blog-videos'.$blog->video);
                    if (File::exists($video_path)) {
                        File::delete($video_path);
                    }
                    $destinationPathVideo = public_path('/blog-videos/');
                    $video = date('YmdHis') . "." . $files->getClientOriginalExtension();
                    $files->move($destinationPathVideo, $video);
                    $blog->video = 'blog-videos/' . $video;
                }
                $blog->save();
                return redirect()->back()->with("success", "Blog added successfully");
            } catch (\Exception $exception) {
                return redirect()->back()->with('error', $exception->getMessage());
            }
        }
        if ($request->isMethod('get'))
        {
            return view('back.blogs.create');
        }
    }

    public function update(Request $request, $id){
        if ($request->isMethod('put'))
        {
            $blog = Blog::findOrFail($id);
            $blog->title       = $request->title;
            $blog->description = $request->description;
            $blog->slug        = Str::slug($request->title);
            $blog->link        = $request->link;

            try {
                if ($files = $request->file('image')) {
                    request()->validate([
                        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    ]);
                    $image_path = public_path('blog-images'.$blog->image);
                    if (File::exists($image_path)) {
                        File::delete($image_path);
                    }
                    $destinationPath = public_path('/blog-images/');
                    $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
                    $files->move($destinationPath, $profileImage);
                    $blog->image = 'blog-images/' . $profileImage;
                }
                if ($files = $request->file('video')) {
                    request()->validate([
                        'video' => 'mimes:mp4,ogx,oga,ogv,ogg,webm',
                    ]);
                    $video_path = public_path('blog-videos'.$blog->video);
                    if (File::exists($video_path)) {
                        File::delete($video_path);
                    }
                    $destinationPathVideo = public_path('/blog-videos/');
                    $video = date('YmdHis') . "." . $files->getClientOriginalExtension();
                    $files->move($destinationPathVideo, $video);
                    $blog->video = 'blog-videos/' . $video;
                }
                $blog->save();
                return redirect()->back()->with("success", "Blog updated successfully");
            } catch (\Exception $exception) {
                return redirect()->back()->with('error', $exception->getMessage());
            }
        }
        if ($request->isMethod('get'))
        {
            $blog = Blog::where('id', $id)->first();
            return view('back.blogs.update',compact('blog'));
        }
    }

    public function delete($id)
    {
        $blog = Blog::find($id);
        $image_path = public_path($blog->image);
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        $video_path = public_path($blog->video);
        if (File::exists($video_path)) {
            File::delete($video_path);
        }
        $blog->delete();
        return redirect()->back()->with('success', 'Deleted successfully');
    }
}
