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

        <div class="progress">
            <div class="progress-bar" role="progressbar"
                 style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
        </div><hr>
    </div>

    @foreach($task->questions as $question)
        <div class="container mb-3">
            <div class="row">
                <div class="col-2">
                    {{$loop->iteration}} )
                </div>
                <div class="col-8">
                    <b>{{$question->name}}</b> <a href="{{$question->link}}" target="_blank">{{$question->link}}</a>
                </div>
                <div class="col-2">
                    @if(in_array($question->id , $user_questions))
                        ✔️
                    @else
                        <form method="post" action="{{route('learn-question')}}">
                            @csrf
                            <input type="hidden" name="user_id"
                                   value="{{isset(Auth::guard('site')->user()->id) ? Auth::guard('site')->user()->id : 0}}">
                            <input type="hidden" name="question_id" value="{{$question->id}}">
                            <button type="submit" class="btn btn-outline-success btn-sm">Check</button>
                        </form>
                    @endif
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
