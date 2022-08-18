@extends('back.layouts.master')
@section('title','Users')
@section('content')

  @if(Session::has('error'))
    <div class="alert alert-danger">
      {{ Session::get('error')}}
    </div>
  @elseif(Session::has('success'))
    <div class="alert alert-success">
      {{ Session::get('success')}}
    </div>
  @endif
  @if(AppHelper::instance()->checkPermisson(1) == 1)
      <a href="{{route('admin.create-user')}}" class="btn btn-success btn-sm">Create User
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
          <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
          <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
        </svg>
      </a> <hr>
  @endif
  <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Surname</th>
          <th scope="col">Username</th>
          <th scope="col">Role</th>
          <th scope="col">Email</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($users as $user)
          <tr>
            <th>{{$user->id}}</th>
            <td>{{$user->name}}</td>
            <td>{{$user->surname}}</td>
            <td class="text-danger">{{$user->username}}</td>
            <td>
              @foreach($roles as $role)
                @if($user->role_id == $role->id)
                  {{$role->name}}
                @endif
              @endforeach
            </td>
            <td>{{$user->email}}</td>
            <td>
                @if(AppHelper::instance()->checkPermisson(2) == 1)
                  <a href="{{route('admin.update-user',$user->id)}}" class="btn btn-primary btn-circle btn-sm">
                    <i class="fas fa-edit"></i>
                  </a>
                @endif
                    @if(AppHelper::instance()->checkPermisson(3) == 1)
                  <a href="{{route('admin.delete-user',$user->id)}}" class="btn btn-danger btn-circle btn-sm">
                    <i class="fas fa-trash"></i>
                  </a>
                @endif
            </td>
          </tr>
        @endforeach
      </tbody>
  </table>
  {{ $users->links('pagination::bootstrap-4') }}
@endsection
