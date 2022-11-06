@extends('back.layouts.master')
@section('title','Tasks')
@section('content')
    <a href="{{route('admin.create-task')}}" class="btn btn-success btn-sm">Create new Task</a> <hr>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Slug</th>
            <th scope="col">Image</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($tasks as $task)
            <tr>
                <th>{{$loop->iteration}}</th>
                <th>{{$task->title}}</th>
                <th>{{Str::limit($task->description, 50)}}</th>
                <th>{{$task->slug}}</th>
                <th><img src="{{asset($task->image)}}" width="180px" height="160px"/></th>
                <td>
                   Acts
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
