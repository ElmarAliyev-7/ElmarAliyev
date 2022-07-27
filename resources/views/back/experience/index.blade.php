@extends('back.layouts.master')
@section('title','Experience & Education')
@section('content')

    @if(Session::has('error'))
        <div class="alert alert-danger">
            {{ Session::get('error')}}
        </div>
    @elseif(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success')}}
        </div>
    @endif
    <a href="{{route('admin.add-experience')}}" class="btn btn-success btn-sm">Add new skill
    </a> <hr>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Parent_id</th>
            <th scope="col">Percent</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        
        </tbody>
    </table>
@endsection
