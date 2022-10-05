@extends('front.layouts.master')
@section('content')
    <div class="container" id="register">
        <!-- Outer Row -->
        <div class="row justify-content-center" id="sing-in" style="display:none;">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    @include('front.flash-message')
                                    <form action="{{route('login')}}" method="POST" class="user">
                                        @csrf
                                        <div class="form-group">
                                            <label for="exampleInputUserame">Userame</label>
                                            <input type="text" name="username" class="form-control" id="exampleInputUserame" placeholder="Enter Username">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Password</label>
                                            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                        </div>
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a href="#sing-up" onclick="showSignUp()" id="sing-up-button">Create an accaunt</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center" id="sing-up">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Sing up</h1>
                                    </div>
                                    @include('front.flash-message')
                                    <form action="{{route('register')}}" method="POST" class="user">
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
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a href="#sing-in" onclick="showSignIn()" id="sing-in-button">Already have account ?</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
