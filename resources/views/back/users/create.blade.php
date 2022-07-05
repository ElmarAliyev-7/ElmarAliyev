@extends('back.layouts.master')
@section('title','Create User')
@section('content')
<div class="container">
  <form action="{{route('admin.create-user-post')}}" method="POST">
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
      <input type="text" name="name" class="form-control" id="exampleInputName" placeholder="Enter Name">
    </div>
    <div class="form-group">
      <label for="exampleInputSurname">Surname</label>
      <input type="text" name="surname" class="form-control" id="exampleInputSurname" placeholder="Enter Surname">
    </div>
    <div class="form-group">
      <label for="exampleInputUserame">Userame</label>
      <input type="text" name="username" class="form-control" id="exampleInputUserame" placeholder="Enter Username">
    </div>
    <div class="form-group">
      <label for="exampleSelect">Select Role</label>
      <select class="form-control" id="exampleSelect" name="role_id">
        @foreach ($roles as $role)
          <option value="{{$role->id}}">{{$role->name}}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail">Email address</label>
      <input type="email" name="email" class="form-control" id="exampleInputEmail" placeholder="Enter email">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword2">Password Confirmation</label>
      <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword2" placeholder="Password Confirmation">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
@endsection