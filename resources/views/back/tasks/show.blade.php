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
            </div>
            <div class="col">
                <p>{{$task->description}}</p>
            </div>
            <div class="col">
                <img  src="{{asset($task->image)}}" width="320px" height="210px"/>
            </div>
        </div>

        <ul class="form-class">
            @foreach($task->questions as $question)
                <li>
                    {{$question->name}} <span class="text-primary">{{$question->link}}</span>
                    <form method="POST" action="{{ route('admin.delete-question', $question->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-circle btn-sm">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
