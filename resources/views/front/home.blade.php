@extends('front.layouts.master')
@section('content')
    <div class="vg-page page-home" id="home" style="background-image: url(front/assets/img/bg_image_1.jpg)">
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
                <li class="nav-item">
                    <a href="#blog" class="nav-link" data-animate="scrolling">Blog</a>
                </li>
                <li class="nav-item">
                    <a href="#contact" class="nav-link" data-animate="scrolling">Contact</a>
                </li>
                </ul>
                <ul class="nav ml-auto">
                     <li class="nav-item">
                        <a href="{{route('register')}}" data-animate="scrolling">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                            </svg>
                        </a>
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
    {{-- @include('front.widgets.testimonial') --}}
    @include('front.widgets.blog')
    @include('front.widgets.contact')
@endsection
