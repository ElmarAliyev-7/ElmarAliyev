@extends('front.layouts.master')
@section('content')
    <div class="container">
        <form action="{{route('update-profile',$user->id)}}" method="POST" id="update-form">
            @csrf
            @include('front.flash-message')
            <a href="#change-password" onclick="changePassword()">Change Password</a><hr>
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
                <label for="exampleInputEmail">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail" value="{{$user->email}}"  placeholder="Enter email">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <form action="{{route('update-password',$user->id)}}" method="POST" id="change-password" style="display: none;">
            @csrf
            @include('front.flash-message')
            <a href="#update-form" onclick="profile()">Profile</a><hr>
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
    @push('js')
        <script>
            if(window.location.pathname == '/profile'){
                $(document).ready(function() {
                    function scrollToRegister() {
                        $('html, body').animate({
                            scrollTop: $("#update-form").offset().top
                        }, 1000);
                    }
                    scrollToRegister()
                });
            }

            function changePassword()
            {
                $('#update-form').hide();
                $('#change-password').show();
            }

            function profile()
            {
                $('#update-form').show();
                $('#change-password').hide();
            }
        </script>
    @endpush
@endsection
