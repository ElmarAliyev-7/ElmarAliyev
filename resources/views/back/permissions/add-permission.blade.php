@extends('back.layouts.master')
@section('title','Add Permission Page')
@section('content')
<div class="container">
    <h3 class="text-center">{{$role->name}}</h3>
    <form action="{{route('admin.create-permission',$role->id)}}" method="post">
        @csrf
        @foreach ($permissions as $permission)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="flexCheckDefault{{$loop->iteration}}"
                value="{{$permission->id}}" name="permissions[]" @foreach ($role_perms as $role_perm) @if($role_perm->permission_id == $permission->id) checked @endif @endforeach>
                <label class="form-check-label" for="flexCheckDefault{{$loop->iteration}}">
                    <h5>{{$permission->name}}</h5>
                </label>
            </div>
        @endforeach
        <button type="submit" class="btn btn-success">OK</button>
    </form>
</div>

@endsection
