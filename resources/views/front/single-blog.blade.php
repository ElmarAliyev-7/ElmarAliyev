@extends('front.layouts.master')
@section('content')
    <div class="container my-5" id="context">
        <div class="row">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h1 class="text-center mb-4">{{$blog->title}}</h1>
                <span><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                      <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                      <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                    </svg>
                    <sup><b>{{$blog->reads}}</b></sup>
                </span>
            </div>
            <div>
                <div class="float-right pl-3">
                    <img src="{{asset($blog->image)}}" width="300px" height="275px" style="border:1px solid black;"/>
                </div>
                @if($blog->video)
                    <div class="float-left pr-3">
                        <video src="{{asset($blog->video)}}" controls width="300px" height="275px"></video>
                    </div>
                @endif
                <p style="text-indent: 40px;text-align: justify;">{!! $blog->description !!}</p>
                <a href="{{$blog->link}}" target="_blank" style="text-decoration: underline">Source link</a>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        let url      = $(location).attr('href');
        let segments = url.split('/');

        if(segments[3] === 'blog') {
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
