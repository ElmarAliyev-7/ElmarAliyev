@extends('back.layouts.master')
@section('title','Create Experience & Education')
@section('content')
    <div class="container">
        <form action="{{route('admin.create-experience')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('front.flash-message')
            <div class="form-group">
                <label for="exampleInputTitle1">Select Type</label>
                <select name="type" class="form-control" id="exampleInputTitle1">
                @foreach ( config('settings.exp_edu') as $key => $item)
                  <option value="{{$key}}">{{$item}}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputTitle">Company Name</label>
                <input type="text" name="company_name" class="form-control" id="exampleInputTitle" placeholder="Enter Company Name" required>
            </div>
            <div class="form-group">
                <label for="exampleInputImage">Logo</label>
                <input type="file" name="image" class="form-control" id="exampleInputImage">
            </div>
            <div class="form-group">
                <label for="exampleInputTitle2">Duty</label>
                <input type="text" name="duty" class="form-control" id="exampleInputTitle2" placeholder="Enter Duty" required>
            </div>
            <div class="form-group">
                <label for="exampleInputTitle4">Start time</label>
                <input type="date" name="start" class="form-control" id="exampleInputTitle4" placeholder="Enter Start time" required>
            </div>
            <div class="form-group">
                <label for="exampleInputTitle5">End time</label>
                <input type="date" name="end" class="form-control" id="exampleInputTitle5" placeholder="Enter End time">
            </div>
            <div class="form-group" id="work-time">
                <label for="exampleInputTitle3">Work time</label>
                <select name="work_time" class="form-control" id="exampleInputTitle3">
                @foreach ( config('settings.work_time') as $key => $item)
                  <option value="{{$key}}">{{$item}}</option>
                @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection

@push('js')
<script>
  $("#exampleInputTitle1").change(function(){
      if ( $(this).val() == "0" ) {
        $("#work-time").show();
          $("#exampleInputTitle3").val(0);
      }
      else{
        $("#work-time").hide();
        $("#exampleInputTitle3").val(null);
      }
  });
</script>
@endpush
