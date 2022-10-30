@extends('back.layouts.master')
@section('title','Update User -> '."$user->username")
@section('content')
<div class="container">
  <form action="{{route('admin.update-user', $user->id)}}" method="POST">
    @csrf
    @method('PUT')
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
      <label for="exampleSelect">Select Role</label>
      <select class="form-control" id="exampleSelect" name="role_id">
          @if(gettype($roles) == 'object' && count($roles) > 0)
              @foreach ($roles as $role)
                  <option value="{{$role->id}}" @if($user->role_id == $role->id) selected @endif>
                      {{$role->name}}
                  </option>
              @endforeach
          @else
              <option value="{{$roles->id}}" @if($user->role_id == $roles->id) selected @endif>
                  {{$roles->name}}
              </option>
          @endif
      </select>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail">Email address</label>
      <input type="email" name="email" class="form-control" id="exampleInputEmail" value="{{$user->email}}"  placeholder="Enter email">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
@endsection
