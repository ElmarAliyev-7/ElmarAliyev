@extends('back.layouts.master')
@section('title','Tasks')
@section('content')
    <a href="{{route('admin.create-task')}}" class="btn btn-success btn-sm">Create new Task</a>
    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addQuestion">Add Question</button> <hr>

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
                            <form method="POST" action="{{ route('admin.delete-task', $task->id) }}" class="float-right">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-circle">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addQuestion" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form method="post" action="{{route('admin.create-question')}}">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Add Question To Task</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <select class="form-control" name="task_id">
                            @foreach($tasks as $task)
                                <option value="{{$task->id}}">{{$task->title}}</option>
                            @endforeach
                        </select> <br>
                        <input type="text" name="name" class="form-control" placeholder="Question Name"> <br>
                        <input type="text" name="link" class="form-control" placeholder="Question Link">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
