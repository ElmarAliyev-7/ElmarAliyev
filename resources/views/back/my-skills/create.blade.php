@extends('back.layouts.master')
@section('title','Create Skill')
@section('content')
    <div class="container">
        <form action="{{route('admin.skill-post')}}" method="POST">
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
                <label for="exampleInputTitle1">Select top category</label>
                <select name="parent_id" class="form-control" id="exampleInputTitle1">
                    <option value="0">Top category</option>
                    @foreach($skills as $skill)
                        <option value="{{$skill->id}}">{{$skill->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputTitle">Skill</label>
                <input type="text" name="skill" class="form-control" id="exampleInputTitle" placeholder="Enter Skill Name" required>
            </div>
            <div class="form-group" id="percent">
                <label for="exampleInputTitle2">Enter Skill Knowladge Percent </label>
                <input type="number" name="percent" class="form-control" id="exampleInputTitle2" placeholder="90%">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection

@push('js')
<script>
    $("#exampleInputTitle1").change(function(){
        if ( $(this).val() == "0" ) { 
            $("#percent").show();
        }
        else{ 
            $("#percent").hide();
        }
    }); 
</script>
@endpush