@extends('back.layouts.master')
@section('title','HomePage')
@section('content')
<div class="container">
  <form action="{{route('admin.home-page')}}" method="POST" enctype="multipart/form-data">
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
      <input type="text" name="title" class="form-control" id="exampleInputTitle" value="{{$data->title}}" placeholder="Enter Title">
    </div>
    <div class="form-group">
      <label for="exampleInputSubtitle">Subtitle</label>
      <input type="text" name="subtitle" class="form-control" id="exampleInputSubtitle" value="{{$data->subtitle}}" placeholder="Enter Subtitle">
    </div>
    <div class="form-group">
      <label for="exampleInputDuty">Duty</label>
      <input type="text" name="duty" class="form-control" id="exampleInputDuty" value="{{$data->duty}}" placeholder="Enter Duty">
    </div>
    <div class="form-group">
      <label for="exampleInputBackground">
        Background <br>
        <img src="{{asset($data->background)}}" width="180px" height="160px"/>
      </label>
      <input type="file" name="background" class="form-control" id="exampleInputBackground">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
@endsection