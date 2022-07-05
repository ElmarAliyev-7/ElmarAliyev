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
    <a href="{{route('admin.create-user')}}">Create One</a>
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
              <th>{{$loop->iteration}}</th>
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
                <a href="{{route('admin.update-user',$user->id)}}" class="btn btn-primary btn-circle btn-sm">
                  <i class="fas fa-edit"></i>
                </a>
                <a href="{{route('admin.delete-user',$user->id)}}" class="btn btn-danger btn-circle btn-sm">
                  <i class="fas fa-trash"></i>
                </a>
              </td>
              
          </tr>
        @endforeach
      </tbody>
  </table>
  {{ $users->links() }}
@endsection