@extends('back.layouts.master')
@section('title','Create Task')
@section('content')
    <div class="container">
        <form action="{{route('admin.create-task')}}" method="POST" enctype="multipart/form-data">
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
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
