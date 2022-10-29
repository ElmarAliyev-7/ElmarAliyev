@extends('back.layouts.master')
@section('title','About Me')
@section('content')
<div class="container">
  <form action="{{route('admin.about-post')}}" method="POST" enctype="multipart/form-data">
    @csrf
      @if(AppHelper::instance()->checkPermisson(12) == 0)
          <div class="alert alert-warning">You don't have permission for updating data</div>
      @endif
    <div class="form-group">
      <label for="exampleInputTitle">FullName</label>
      <input type="text" name="fullname" class="form-control" id="exampleInputTitle" value="{{$data->fullname}}" placeholder="Enter Title">
    </div>
    <div class="form-group">
      <label for="exampleInputDuty">Duty</label>
      <input type="text" name="duty" class="form-control" id="exampleInputDuty" value="{{$data->duty}}" placeholder="Enter Duty">
    </div>
    <div class="form-group">
      <label for="exampleInputDescription">Description</label>
      <textarea name="description" id="exampleInputDescription" class="form-control" cols="10" rows="5">{{$data->description}}</textarea>
    </div>
    <div class="form-group">
      <label for="exampleInputFrom">From</label>
      <input type="text" name="from" class="form-control" id="exampleInputFrom" value="{{$data->from}}" placeholder="From">
    </div>
    <div class="form-group">
      <label for="exampleInputLivesin">Lives in</label>
      <input type="text" name="lives_in" class="form-control" id="exampleInputLivesin" value="{{$data->lives_in}}" placeholder="Lives in">
    </div>
    <div class="form-group">
      <label for="exampleInputAge">Age</label>
      <input type="number" name="age" class="form-control" id="exampleInputAge" value="{{$data->age}}" placeholder="Age">
    </div>
    <div class="form-group">
      <label>Gender</label>
      <div class="container">
        <label for="exampleInputMale">Male</label>
        <input type="radio" name="gender" placeholder="Male" id="exampleInputMale" value="male" @if($data->gender=="male") checked @endif>
        <label for="exampleInputFemale">Female</label>
        <input type="radio" name="gender" placeholder="Male" id="exampleInputFemale" value="female" @if($data->gender=="female") checked @endif>
      </div>
    </div>
    <div class="form-group">
      <label for="exampleInputCv">Cv</label>
        <a href="{{route('download-cv')}}" class="btn btn-warning btn-sm float-right">
          Download Current CV
        </a>
      <input type="file" name="cv" class="form-control" id="exampleInputCv">
    </div>
    <div class="form-group">
      <label for="exampleInputBackground">
        Image <br>
        <img src="{{asset($data->image)}}" width="180px" height="160px"/>
      </label>
      <input type="file" name="image" class="form-control" id="exampleInputBackground">
    </div>
      @if(AppHelper::instance()->checkPermisson(12) == 1)
        <button type="submit" class="btn btn-primary">Submit</button>
      @endif
  </form>
</div>
@endsection
