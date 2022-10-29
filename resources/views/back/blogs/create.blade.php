@extends('back.layouts.master')
@section('title','Create Blog')
@section('content')
    <div class="container">
        <form action="{{route('admin.create-blog')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleInputTitle">Title</label>
                <input type="text" name="title" class="form-control" id="exampleInputTitle" placeholder="Enter Title" required>
            </div>
            <div class="form-group">
                <label for="exampleInputTitle2">Description</label>
                <textarea name="description" class="form-control" id="exampleInputTitle2" rows="8" col="5" required
                          placeholder="Enter Description"></textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputTitle4">Image</label>
                <input type="file" name="image" class="form-control" id="exampleInputTitle4" accept="image/png, image/gif, image/jpeg" required>
            </div>
            <div class="form-group">
                <label for="exampleInputTitle6">Video</label>
                <input type="file" name="video" class="form-control" id="exampleInputTitle6" accept="video/mp4,video/x-m4v,video/*">
            </div>
            <div class="form-group">
                <label for="exampleInputTitle5">Link</label>
                <input type="text" name="link" class="form-control" id="exampleInputTitle5" placeholder="Enter Link">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
