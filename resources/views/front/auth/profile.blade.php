@extends('front.layouts.master')
@section('content')
    <div class="container">
        <div id="update-form">
            <div class="col-12">
                <a href="#change-password" onclick="changePassword()">Change Password</a>
                <a href="#change-password" onclick="viewTasks()" class="float-right">Tasks</a>
            </div>
            <form action="{{route('update-profile',$user->id)}}" method="POST">
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
                    <label for="exampleInputEmail">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail" value="{{$user->email}}"  placeholder="Enter email">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

        <div id="change-password" style="display: none;">
            <div class="col-12">
                <a href="#update-form" onclick="profile()">Profile</a>
                <a href="#change-password" onclick="viewTasks()" class="float-right">Tasks</a>
            </div>
            <form action="{{route('update-password',$user->id)}}" method="POST">
                @csrf
                @method('PATCH')
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

        <div class="row" id="tasks" style="display: none;">
            <div class="col-12">
                <a href="#update-form" onclick="profile()">Profile</a>
                <a href="#change-password" onclick="changePassword()" class="float-right">Change Password</a>
            </div>

            @foreach ($tasks as $task)
                <div class="col-3 mr-4 card" style="width: 18rem;">
                    <img class="card-img-top" src="{{asset($task->image)}}" height="200px">
                    <div class="card-body">
                        <h5 class="card-title">{{$task->title}}</h5>
                        <p class="card-text">{{$task->description}}</p>
                        <a href="{{route('task',$task->slug)}}" class="btn btn-primary">Details</a>
                    </div>
                </div>
            @endforeach
        </div>

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
                $('#tasks').hide();
                $('#change-password').show();
            }

            function profile()
            {
                $('#tasks').hide();
                $('#change-password').hide();
                $('#update-form').show();
            }

            function viewTasks()
            {
                $('#update-form').hide();
                $('#change-password').hide();
                $('#tasks').show();
            }
        </script>
    @endpush
@endsection
