@extends('back.layouts.master')
@section('title','Experience')
@section('content')
    <div class="container">
        <form action="" method="POST">
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
                    <option value="experience">experience</option>
                    <option value="education">education</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputTitle">Company Name</label>
                <input type="text" name="company_name" class="form-control" id="exampleInputTitle" placeholder="Enter Company Name" required>
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
                <input type="date" name="end" class="form-control" id="exampleInputTitle5" placeholder="Enter End time" required>
            </div>
            <div class="form-group">
                <label for="exampleInputTitle3">Work time</label>
                <select name="type" class="form-control" id="exampleInputTitle3">
                    <option value="Part-time">Part-time</option>
                    <option value="Full-time">Full-time</option>
                    <option value="Freelance">Freelance</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
