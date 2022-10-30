@extends('back.layouts.master')
@section('title','Add Permission Page')
@section('content')
<div class="container">
    <h3 class="text-center">{{$role->name}}</h3>
    <form action="{{route('admin.create-permission',$role->id)}}" method="post">
        @csrf
        @foreach ($permissions as $permission)
            <input class="form-check-input" type="checkbox" id="flexCheckDefault_{{$loop->iteration}}"
                   value="{{$permission->id}}" name="permissions[]"
                   @foreach ($role_perms as $role_perm) @if($role_perm->permission_id == $permission->id) checked @endif @endforeach>
            <label  for="flexCheckDefault_{{$loop->iteration}}" class="badge @if($permission->type == 1) badge-danger
            @elseif($permission->type ==2) badge-info @else badge-dark @endif">
                {{$permission->name}}
            </label>
        @endforeach
        <button type="submit" class="btn btn-success btn-sm">OK</button>
    </form>
</div>

@endsection
