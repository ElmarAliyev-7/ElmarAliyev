@extends('back.layouts.master')
@section('title','My Skills')
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
      @if($auth_user_perm->permission_id === 4)
        <a href="{{route('admin.my-skills')}}" class="btn btn-success btn-sm">Add new skill
        </a> <hr>
      @endif
    @endforeach
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
        @foreach ($skills as $skill)
            <tr>
                <th>{{$loop->iteration}}</th>
                <td @if($skill->parent_id == 0) class="text-danger" @endif>{{$skill->name}}</td>
                <td>{{$skill->parent_id}}</td>
                <td>@if ($skill->percent == 0)
                    ⛔
                @else
                    {{$skill->percent}}
                @endif</td>
                <td>
                @foreach ($auth_user_perms as $auth_user_perm)
                    @if($auth_user_perm->permission_id === 5)
                        <a href="{{route('admin.delete-skill',$skill->id)}}" class="btn btn-danger btn-circle btn-sm">
                            <i class="fas fa-trash"></i>
                        </a>
                    @endif
                @endforeach
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $skills->links('pagination::bootstrap-4') }}
@endsection
