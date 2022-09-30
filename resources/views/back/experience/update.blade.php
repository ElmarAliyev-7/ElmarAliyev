@extends('back.layouts.master')
@section('title','Update Experience & Education')
@section('content')
    <div class="container">
        <form action="{{route('admin.update-experience',$experience->id)}}" method="POST" enctype="multipart/form-data">
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
                <label for="exampleInputTitle1">Select Type</label>
                <select name="type" class="form-control" id="exampleInputTitle1">
                    @foreach ( config('settings.exp_edu') as $key => $item)
                        <option value="{{$key}}" @if($experience->type == $key) selected @endif>{{$item}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputTitle">Company Name</label>
                <input type="text" name="company_name" value="{{$experience->company_name}}" class="form-control" id="exampleInputTitle" placeholder="Enter Company Name" required>
            </div>
            <div class="form-group">
                <label for="exampleInputImage">Logo</label>
                <img src="{{asset($experience->image)}}" width="180px" height="160px"/>
                <input type="file" name="image" class="form-control" id="exampleInputImage">
            </div>
            <div class="form-group">
                <label for="exampleInputTitle2">Duty</label>
                <input type="text" name="duty" value="{{$experience->duty}}" class="form-control" id="exampleInputTitle2" placeholder="Enter Duty" required>
            </div>
            <div class="form-group">
                <label for="exampleInputTitle4">Start time</label>
                <input type="date" name="start" value="{{$experience->start}}" class="form-control" id="exampleInputTitle4" placeholder="Enter Start time" required>
            </div>
            <div class="form-group">
                <label for="exampleInputTitle5" id="end-time-lable">End time</label>
                @if($experience->end)
                    <button type="button" class="btn btn-danger btn-sm" id="remove-end-time">
                        Make Present And Delete End time
                    </button>
                @endif
                <input type="date" name="end" value="{{$experience->end}}" class="form-control" id="exampleInputTitle5" placeholder="Enter End time">
            </div>
            <div class="form-group" id="work-time">
                <label for="exampleInputTitle3">Work time</label>
                <select name="work_time" class="form-control" id="exampleInputTitle3">
                    @foreach ( config('settings.work_time') as $key => $item)
                        <option value="{{$key}}" @if($experience->work_time == $key) selected @endif>{{$item}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection

@push('js')
    <script>
        if($("#exampleInputTitle1").val() == 1){
            $("#work-time").hide();
            $("#exampleInputTitle3").val(null);
        }

        $("#remove-end-time").click(function() {
            $("#remove-end-time").hide();
            $("#exampleInputTitle5").hide();
            $("#end-time-lable").hide();
            $("#exampleInputTitle5").val(null);
        });

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
