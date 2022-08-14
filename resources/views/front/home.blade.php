@extends('front.layouts.master')
@section('content')
    <div class="vg-page page-home" id="home" style="background-image: url({{asset($home_page->background)}})">
        <!-- Navbar -->
        <div class="navbar navbar-expand-lg navbar-dark sticky" data-offset="500">
            <div class="container">
            <a href="#" class="navbar-brand">Elmar Aliyev</a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#main-navbar" aria-expanded="true">
                <span class="ti-menu"></span>
            </button>
            <div class="collapse navbar-collapse" id="main-navbar">
                <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a href="#" class="nav-link" data-animate="scrolling">Home</a>
                </li>
                <li class="nav-item">
                    <a href="#about" class="nav-link" data-animate="scrolling">About</a>
                </li>
                <li class="nav-item">
                    <a href="#service" class="nav-link" data-animate="scrolling">Service</a>
                </li>
                <li class="nav-item">
                    <a href="#portfolio" class="nav-link" data-animate="scrolling">Portfolio</a>
                </li>
{{--                <li class="nav-item">--}}
{{--                    <a href="#blog" class="nav-link" data-animate="scrolling">Blog</a>--}}
{{--                </li>--}}
                <li class="nav-item">
                    <a href="#contact" class="nav-link" data-animate="scrolling">Contact</a>
                </li>
                </ul>
                <ul class="nav ml-auto">
                     <li class="nav-item">
{{--                        <a href="{{route('register')}}" data-animate="scrolling" class="text-light">--}}
{{--                            Sign in/ Sing up--}}
{{--                        </a>--}}
                    </li>
                </ul>
            </div>
            </div>
        </div>
        <!-- End Navbar -->
        <!-- Caption header -->
        <div class="caption-header text-center wow zoomInDown">
            <h5 class="fw-normal">{{$home_page->title}}</h5>
            <h1 class="fw-light mb-4">
                @foreach($home_subtitle_array as $key => $subtitle)
                    @if($key == 1)<b class="fg-theme">{{$subtitle}}</b> @else {{$subtitle}} @endif
                @endforeach
            </h1>
            <div class="badge">{{$home_page->duty}}</div>
        </div>
        <!-- End Caption header -->
        <div class="floating-button"><span class="ti-mouse"></span></div>
    </div>
    @include('front.widgets.about')
     @include('front.widgets.service')
    @include('front.widgets.funfact')
    @include('front.widgets.portfolio')
{{--    @include('front.widgets.blog')--}}
    @include('front.widgets.contact')
@endsection
