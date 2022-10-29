@extends('back.layouts.master')
@section('title','Give Permission Page')
@section('content')
    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Role</th>
            <th scope="col">Permissions</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($roles as $role)
            <tr>
                <th>{{$loop->iteration}}</th>
                <td>{{$role->name}}</td>
                <td>
                    @if($role->id == 3)
                       <span class="badge badge-danger">Standart user doesn't have any permission</span>
                    @else
                        @foreach($role->permissions as $permission)
                            <span
                                class="badge @if($permission->type==1) badge-success @elseif($permission->type==2) badge-info
                                    @else badge-dark @endif">{{$permission->name}}</span>
                        @endforeach
                    @endif
                </td>
                <td>
                    @if ($role->id == 1)
                        <img src="{{asset('super_admin.gif')}}" height="140px"/>
                    @elseif($role->id == 3)
                        <img src="{{asset('user.gif')}}" height="140px"/>
                    @else
                    <a href="{{route('admin.create-permission',$role->id)}}" class="btn btn-success btn-circle btn-sm w-100">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                            <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                            <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                        </svg>
                    </a>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
