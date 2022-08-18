@extends('back.layouts.master')
@section('title','Messages')
@section('content')
@if(count($auth_user_perms) == 0)
    <div class="alert alert-warning">You don't have permission for View Messages</div>
@else
    @foreach ($auth_user_perms as $auth_user_perm)
        @if($auth_user_perm->permission_id === 14)
        <table class="table table-bordered">
            @if(Session::has('error'))
                <div class="alert alert-danger">
                    {{ Session::get('error')}}
                </div>
            @elseif(Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success')}}
                </div>
            @endif
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Subject</th>
                <th scope="col">Message</th>
                <th scope="col">Seen</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($messages as $message)
                <tr>
                    <th>{{$loop->iteration}}</th>
                    <td>{{$message->name}}</td>
                    <td>{{$message->email}}</td>
                    <td>{{$message->subject}}</td>
                    <td>{{$message->message}}</td>
                    <td>@if($message->seen == 1)
                           <p class="text-success">Seened</p>
                    @else
                        <a href="{{route('admin.checked-seen',$message->id)}}" class="btn btn-primary btn-circle btn-sm">
                            <i class="fas fa-eye"></i>
                        </a>
                    @endif</td>
                    <td>
                        @foreach ($auth_user_perms as $auth_user_perm)
                        @if($auth_user_perm->permission_id === 11)
                            <a href="{{route('admin.delete-message',$message->id)}}" class="btn btn-danger btn-circle btn-sm">
                                <i class="fas fa-trash"></i>
                            </a>
                        @endif
                        @endforeach
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $messages->links('pagination::bootstrap-4') }}
        @endif
    @endforeach
@endif
@endsection
