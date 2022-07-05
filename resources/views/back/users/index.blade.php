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

  <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">FullnName</th>
          <th scope="col">Email</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($users as $user)
          <tr>
              <th>{{$loop->iteration}}</th>
              <td>{{$user->name}}</td>
              <td>{{$user->email}}</td>
              <td>
                <a href="#" class="btn btn-primary btn-circle btn-sm">
                  <i class="fas fa-edit"></i>
                </a>
                <a href="#" class="btn btn-danger btn-circle btn-sm">
                  <i class="fas fa-trash"></i>
                </a>
              </td>
              
          </tr>
        @endforeach
      </tbody>
  </table>
  {!! $users->links() !!}
@endsection