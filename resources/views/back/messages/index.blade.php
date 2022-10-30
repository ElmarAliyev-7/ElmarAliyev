@extends('back.layouts.master')
@section('title','Messages')
@section('content')
@if(count($messages) > 0)
    <form method="POST" action="{{route('admin.delete-all-messages')}}">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm">
            Bulk Delete <i class="fas fa-trash"></i>
        </button>
    </form>  <hr>
@endif
<table class="table table-bordered">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Subject</th>
        <th scope="col">Show Message</th>
        <th scope="col">Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($messages as $message)
        <tr>
            <th>{{$loop->iteration}}</th>
            <td>{{$message->name}}</td>
            <td>{{$message->subject}}</td>
            <td>
                @if(AppHelper::instance()->checkPermisson(14) == 1)
                    <a href="{{route('admin.show-message',$message->id)}}" class="btn btn-primary btn-circle btn-sm">
                        <i class="fas fa-eye"></i>
                    </a>
                @endif
            </td>
            <td>
                @if(AppHelper::instance()->checkPermisson(11) == 1)
                    <form method="POST" action="{{ route('admin.delete-message', $message->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-circle btn-sm">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{{ $messages->links('pagination::bootstrap-4') }}
@endsection
