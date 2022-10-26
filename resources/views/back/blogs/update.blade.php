@extends('back.layouts.master')
@section('title','Update Blog')
@section('content')
    <div class="container">
        <form action="{{route('admin.update-blog',$blog->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleInputTitle">Title</label>
                <input type="text" name="title" class="form-control" id="exampleInputTitle" value="{{$blog->title}}" placeholder="Enter Title" required>
            </div>
            <div class="form-group">
                <label for="exampleInputTitle2">Description</label>
                <textarea name="description" class="form-control" id="exampleInputTitle2" rows="8" col="5" required>{{$blog->description}}</textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputTitle4">Image</label> <br>
                <img src="{{asset($blog->image)}}" width="220px" height="180px"/>
                <input type="file" name="image" class="form-control" id="exampleInputTitle4" accept="image/png, image/gif, image/jpeg">
            </div>
            <div class="form-group">
                <label for="exampleInputTitle6">Video</label> <br>
                <video src="{{asset($blog->video)}}" width="220px" height="180px" controls></video>
                <input type="file" name="video" class="form-control" id="exampleInputTitle6" accept="video/mp4,video/x-m4v,video/*">
            </div>
            <div class="form-group">
                <label for="exampleInputTitle5">Link</label>
                <input type="text" name="link" value="{{$blog->link}}" class="form-control" id="exampleInputTitle5" placeholder="Enter Link">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
