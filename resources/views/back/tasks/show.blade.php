@extends('back.layouts.master')
@section('title', $task->title)
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <button type="button" class="btn btn-primary">
                    Questions <span class="badge badge-light">{{count($task->questions)}}</span>
                    <span class="sr-only">unread messages</span>
                </button>
                @if(AppHelper::instance()->checkPermisson(20) == 1)
                    <button class="btn btn-success" data-toggle="modal" data-target="#addQuestion">Add Question</button>
                @endif
            </div>
            <div class="col">
                <p>{{$task->description}}</p>
            </div>
            <div class="col">
                <img  src="{{asset($task->image)}}" width="320px" height="210px"/>
            </div>
        </div>
    </div>

    @foreach($task->questions as $question)
        <div class="container mb-3">
            <div class="row">
                <div class="col-2">
                    {{$loop->iteration}} )
                </div>
                <div class="col-8">
                    {{$question->name}} <span class="text-primary">{{$question->link}}</span>
                </div>
                <div class="col-2">
                    <form method="POST" action="{{ route('admin.delete-question', $question->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-circle btn-sm">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

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
                        <input type="hidden" name="task_id" value="{{$task->id}}"> <br>
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
