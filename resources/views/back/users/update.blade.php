@extends('back.layouts.master')
@section('title','Update User -> '."$user->username")
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
      <label for="exampleSelect">Select Role</label>
      <select class="form-control" id="exampleSelect" name="role_id">
        @foreach ($roles as $role)
          <option value="{{$role->id}}" @if($user->role_id == $role->id) selected @endif>
            {{$role->name}}
          </option>
        @endforeach
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