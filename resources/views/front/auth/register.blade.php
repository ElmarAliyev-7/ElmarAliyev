@extends('front.layouts.master')
@section('content')
<div class="container" id="register">
  <div class="sing row justify-content-center p-2">
    <button onclick="showSignUp()" class="btn btn-light" id="sing-up-button" style="display: none;">Sing-up</button>
    <button onclick="showSignIn()" class="btn btn-dark" id="sing-in-button">Sing-in</button>
  </div>
  @include('front.flash-message')
  <div class="shadow-lg p-3 rounded" id="sing-up">
    <form action="{{route('register')}}" method="POST">
      @csrf
      <div class="form-group">
        <label for="exampleInputName">Name</label>
        <input type="text" name="name" class="form-control" id="exampleInputName" placeholder="Enter Name" value="{{old('name')}}">
      </div>
      <div class="form-group">
        <label for="exampleInputSurname">Surname</label>
        <input type="text" name="surname" class="form-control" id="exampleInputSurname" placeholder="Enter Surname" value="{{old('surname')}}">
      </div>
      <div class="form-group">
        <label for="exampleInputUserame">Userame</label>
        <input type="text" name="username" class="form-control" id="exampleInputUserame" placeholder="Enter Username" value="{{old('username')}}">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail">Email address</label>
        <input type="email" name="email" class="form-control" id="exampleInputEmail" placeholder="Enter email" value="{{old('email')}}">
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
  <div class="shadow-lg p-3 rounded" id="sing-in" style="display:none;">
    <form action="{{route('login')}}" method="POST">
      @csrf
      <div class="form-group">
        <label for="exampleInputUserame">Userame</label>
        <input type="text" name="username" class="form-control" id="exampleInputUserame" placeholder="Enter Username">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>

@push('js')
<script>
  $(document).ready(function() {
      function scrollToRegister() {
          $('html, body').animate({
              scrollTop: $("#register").offset().top
          }, 1000);
      }

      scrollToRegister()
  });

  function showSignUp(){
      $('#sing-up').show();
      $('#sing-in').hide();

      $("#sing-in-button").show();
      $("#sing-up-button").hide();
  }
  function showSignIn(){
      $('#sing-in').show();
      $('#sing-up').hide();

      $("#sing-up-button").show();
      $("#sing-in-button").hide();
  }
</script>
@endpush
@endsection
