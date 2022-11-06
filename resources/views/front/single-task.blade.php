@extends('front.layouts.master')
@section('title', $task->title)
@section('content')
    <div class="container" id="context">
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
    </div>

    @foreach($task->questions as $question)
        <div class="container mb-3">
            <div class="row">
                <div class="col-2">
                    {{$loop->iteration}} )
                </div>
                <div class="col-10">
                    {{$question->name}} <span class="text-primary">{{$question->link}}</span>
                </div>
            </div>
        </div>
    @endforeach
@endsection

@push('js')
    <script>
        let url      = $(location).attr('href');
        let segments = url.split('/');

        if(segments[3] === 'task') {
            $(document).ready(function () {
                function scrollToRegister() {
                    $('html, body').animate({
                        scrollTop: $("#context").offset().top
                    }, 1000);
                }

                scrollToRegister()
            });
        }
    </script>
@endpush
