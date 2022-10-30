@extends('back.layouts.master')
@section('title','My Skills')
@section('content')
    @if(AppHelper::instance()->checkPermisson(4) == 1)
        <a href="{{route('admin.create-skill')}}" class="btn btn-success btn-sm">Add new skill
        </a> <hr>
    @endif
    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Parent_id</th>
            <th scope="col">Percent</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($skills as $skill)
            <tr>
                <th>{{$loop->iteration}}</th>
                <td @if($skill->parent_id == 0) class="text-danger" @endif>{{$skill->name}}</td>
                <td>{{$skill->parent_id}}</td>
                <td>@if ($skill->percent == 0)
                    ⛔
                @else
                    {{$skill->percent}}
                @endif</td>
                <td>
                @if(AppHelper::instance()->checkPermisson(5) == 1)
                    <form method="POST" action="{{ route('admin.delete-skill',$skill->id) }}">
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
    {{ $skills->links('pagination::bootstrap-4') }}
@endsection
