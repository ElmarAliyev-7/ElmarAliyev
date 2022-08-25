@extends('back.layouts.master')
@section('title','Create Project')
@section('content')
    <div class="container">
        <form action="{{route('admin.create-project')}}" method="POST" enctype="multipart/form-data">
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
                <input type="text" name="title" class="form-control" id="exampleInputTitle" placeholder="Enter Title" required>
            </div>
            <div class="form-group">
                <label for="exampleInputTitle2">Comment</label>
                <input type="text" name="comment" class="form-control" id="exampleInputTitle2" placeholder="Enter Comment" required>
            </div>
            <div class="form-group">
                <label for="exampleInputTitle4">Image</label>
                <input type="file" name="image" class="form-control" id="exampleInputTitle4" required>
            </div>
            <div class="form-group">
                <label for="exampleInputTitle3">Program</label>
                <select name="program" class="form-control" id="exampleInputTitle3">
                    @foreach ( config('settings.programs') as $key => $item)
                        <option value="{{$key}}">{{$item}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputTitle5">Order Number</label>
                <input type="number" name="order" class="form-control" id="exampleInputTitle5" placeholder="Enter Order Number">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
