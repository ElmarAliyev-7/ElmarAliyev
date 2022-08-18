@extends('back.layouts.master')
@section('title','Portfolio')
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
    @foreach ($auth_user_perms as $auth_user_perm)
    @if($auth_user_perm->permission_id === 8)
        <a href="{{route('admin.add-project')}}" class="btn btn-success btn-sm">Add new Project
        </a> <hr>
    @endif
    @endforeach
    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Comment</th>
            <th scope="col">Image</th>
            <th scope="col">Program</th>
            <th scope="col">Order</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($projects as $project)
            <tr>
                <th>{{$loop->iteration}}</th>
                <th>{{$project->title}}</th>
                <th>{{Str::limit($project->comment,25)}}</th>
                <th><img src="{{asset($project->image)}}" width="80px" height="60px"/></th>
                <th>{{AppHelper::instance()->getProgramNameByKey($project->program)}}</th>
                <th>{{$project->order}}</th>
                <td>
                    <a href="{{route('admin.update-project',$project->id)}}" class="btn btn-primary btn-circle btn-sm">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="{{route('admin.delete-project',$project->id)}}" class="btn btn-danger btn-circle btn-sm">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
