@extends('back.layouts.master')
@section('title','Profile')
@section('content')
    <div class="container">
        <form action="{{route('admin.update-user-post', $user->id)}}" method="POST">
            @csrf
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
                <label for="exampleInputName">Name</label>
                <input type="text" name="name" class="form-control" id="exampleInputName" value="{{$user->name}}" placeholder="Enter Name">
            </div>
            <div class="form-group">
                <label for="exampleInputSurname">Surname</label>
                <input type="text" name="surname" class="form-control" id="exampleInputSurname" value="{{$user->surname}}" placeholder="Enter Surname">
            </div>
            <div class="form-group">
                <label for="exampleInputUserame">Userame</label>
                <input type="text" name="username" class="form-control" id="exampleInputUserame" value="{{$user->username}}" placeholder="Enter Username">
            </div>
            <div class="form-group">
                <label for="exampleInputRole">Role</label>
                <input type="text" class="form-control" id="exampleInputRole"
                   value="{{AppHelper::instance()->getRoleNameByid($user->role_id)}}" disabled>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail" value="{{$user->email}}"  placeholder="Enter email">
            </div>
            <input type="hidden" value="{{$user->role_id}}" name="role_id"/>
            <input type="hidden" value="{{$user->id}}" name="user_id"/>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <hr>
        <h3>Permissions</h3>
        @if(count($auth_user_perms) > 1)
            <table class="table table-bordered text-center">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Permission</th>
                </tr>
                </thead>
                <tbody>
                @foreach($auth_user_perms as $auth_user_perm)
                    <tr>
                        <th>{{$loop->iteration}}</th>
                        <th>
                            <div class="alert alert-success">
                                {{$auth_user_perm->permission->name}}
                            </div>
                        </th>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <div class="alert alert-warning">You don't have any Permission</div>
        @endif
    </div>

@endsection
