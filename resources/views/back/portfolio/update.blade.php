@extends('back.layouts.master')
@section('title','Update Project')
@section('content')
    <div class="container">
        <form action="{{route('admin.update-project',$project->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{$error}}</div>
                @endforeach
            @endif
            @if(Session::has('error'))
                <div class="alert alert-danger">
                    {{ Session::get('error')}}
                </div>
            @elseif(Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success')}}
                </div>
            @endif
            <div class="form-group">
                <label for="exampleInputTitle">Title</label>
                <input type="text" name="title" class="form-control" id="exampleInputTitle" placeholder="Enter Title" value="{{$project->title}}" required>
            </div>
            <div class="form-group">
                <label for="exampleInputTitle2">Comment</label>
                <input type="text" name="comment" class="form-control" id="exampleInputTitle2" placeholder="Enter Comment" value="{{$project->comment}}" required>
            </div>
            <div class="form-group">
                <img src="{{asset($project->image)}}" width="220px" height="180px"/>
                <label for="exampleInputTitle4">Image</label>
                <input type="file" name="image" class="form-control" id="exampleInputTitle4">
            </div>
            <div class="form-group">
                <label for="exampleInputTitle3">Program</label>
                <select name="program" class="form-control" id="exampleInputTitle3">
                    @foreach ( config('settings.programs') as $key => $item)
                        <option value="{{$key}}" @if($project->program == $key) selected @endif>{{$item}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputTitle5">Order Number</label>
                <input type="number" name="order" class="form-control" id="exampleInputTitle5" placeholder="Enter Order Number" value="{{$project->order}}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
