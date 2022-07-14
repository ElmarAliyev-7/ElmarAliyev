@extends('back.layouts.master')
@section('title','My Skills')
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
    <a href="{{route('admin.my-skills')}}" class="btn btn-success btn-sm">Add new skill
    </a> <hr>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Parent_id</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($skills as $skill)
            <tr>
                <th>{{$loop->iteration}}</th>
                <td>{{$skill->name}}</td>
                <td>{{$skill->parent_id}}</td>
                <td>
                    <a href="{{route('admin.delete-skill',$skill->id)}}" class="btn btn-danger btn-circle btn-sm">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $skills->links() }}
@endsection
