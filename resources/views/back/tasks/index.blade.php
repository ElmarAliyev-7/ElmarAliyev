@extends('back.layouts.master')
@section('title','Tasks')
@section('content')
    @if(AppHelper::instance()->checkPermisson(19) == 1)
        <a href="{{route('admin.create-task')}}" class="btn btn-success btn-sm">Create new Task</a><hr>
    @endif

    <div class="container">
        <div class="row">
            @foreach ($tasks as $task)
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="{{asset($task->image)}}" height="200px">
                        <div class="card-body">
                            <h5 class="card-title">{{$task->title}}</h5>
                            <p class="card-text">{{$task->description}}</p>
                            <a href="{{route('admin.show-task',$task->slug)}}" class="btn btn-primary">Details</a>
                            @if(AppHelper::instance()->checkPermisson(21) == 1)
                                <form method="POST" action="{{ route('admin.delete-task', $task->id) }}" class="float-right">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-circle">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
