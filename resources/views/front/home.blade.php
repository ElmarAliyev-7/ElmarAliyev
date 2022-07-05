@extends('front.layouts.master')
@section('content')
    <div class="vg-page page-home" id="home" style="background-image: url(front/assets/img/bg_image_1.jpg)">
        <!-- Navbar -->
        <div class="navbar navbar-expand-lg navbar-dark sticky" data-offset="500">
            <div class="container">
            <a href="{{route('home')}}" class="navbar-brand">Elmar Aliyev</a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#main-navbar" aria-expanded="true">
                <span class="ti-menu"></span>
            </button>
            <div class="collapse navbar-collapse" id="main-navbar">
                <ul class="navbar-nav ml-auto">
                <li class="nav-item @if(Route::currentRouteName() === 'home') active @endif">
                    <a href="{{route('home')}}" class="nav-link" data-animate="scrolling">Home</a>
                </li>
                <li class="nav-item @if(Route::currentRouteName() === 'about') active @endif">
                    <a href="{{route('about')}}" class="nav-link" data-animate="scrolling">About</a>
                </li>
                <li class="nav-item @if(Route::currentRouteName() === 'projects') active @endif">
                    <a href="{{route('projects')}}" class="nav-link" data-animate="scrolling">Projects</a>
                </li>
                <li class="nav-item @if(Route::currentRouteName() === 'blogs') active @endif">
                    <a href="{{route('blogs')}}" class="nav-link" data-animate="scrolling">Blog</a>
                </li>
                <li class="nav-item @if(Route::currentRouteName() === 'contact') active @endif">
                    <a href="{{route('contact')}}" class="nav-link" data-animate="scrolling">Contact</a>
                </li>
                </ul>
                <ul class="nav ml-auto">
                <li class="nav-item">
                    <a href="{{route('register')}}" data-animate="scrolling">Qeydiyyatdan keç</a>
                </li>
                </ul>
            </div>
            </div>
        </div> 
        <!-- End Navbar -->
        <!-- Caption header -->
        <div class="caption-header text-center wow zoomInDown">
            <h5 class="fw-normal">Welcome</h5>
            <h1 class="fw-light mb-4">I'm <b class="fg-theme">Elmar</b> Aliyev</h1>
            <div class="badge">Backend Developer</div>
        </div> 
        <!-- End Caption header -->
        <div class="floating-button"><span class="ti-mouse"></span></div>
    </div>
    @include('front.widgets.about')
    @include('front.widgets.service')
    @include('front.widgets.funfact')
    @include('front.widgets.portfolio')
    @include('front.widgets.testimonial')
    @include('front.widgets.blog')
    @include('front.widgets.contact')
@endsection