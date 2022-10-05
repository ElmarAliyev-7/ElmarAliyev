<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <meta name="keywords" content="Elmar, Elmar Aliyev, Back End Developer">

  <title>@yield('title', 'Elmar Aliyev')</title>

  <link rel="shortcut icon" href="{{asset('front/assets/favicon.ico')}}" type="image/x-icon">

  <link rel="stylesheet" type="text/css" href="{{asset('front/assets/css/themify-icons.css')}}">

  <link rel="stylesheet" type="text/css" href="{{asset('front/assets/css/bootstrap.css')}}">

  <link rel="stylesheet" type="text/css" href="{{asset('front/assets/vendor/animate/animate.css')}}">

  <link rel="stylesheet" type="text/css" href="{{asset('front/assets/vendor/owl-carousel/owl.carousel.css')}}">

  <link rel="stylesheet" type="text/css" href="{{asset('front/assets/vendor/nice-select/css/nice-select.css')}}">

  <link rel="stylesheet" type="text/css" href="{{asset('front/assets/vendor/fancybox/css/jquery.fancybox.min.css')}}">

  <link rel="stylesheet" type="text/css" href="{{asset('front/assets/css/virtual.css')}}">

  <link rel="stylesheet" type="text/css" href="{{asset('front/assets/css/topbar.virtual.css')}}">

  @stack('css')
</head>
<body class="theme-red">

  <!-- Back to top button -->
  <div class="btn-back_to_top">
    <span class="ti-arrow-up"></span>
  </div>

  <div class="vg-page page-home" id="home" style="background-image: url({{asset($home_page->background)}})">
      <!-- Navbar -->
      <div class="navbar navbar-expand-lg navbar-dark sticky" data-offset="500">
          <div class="container">
              <a href="{{route('home')}}" class="navbar-brand">Elmar Aliyev</a>
              <button class="navbar-toggler" data-toggle="collapse" data-target="#main-navbar" aria-expanded="true">
                  <span class="ti-menu"></span>
              </button>
              <div class="collapse navbar-collapse" id="main-navbar">
                  <ul class="navbar-nav ml-auto">
                      <li class="nav-item active">
                          <a href="{{route('home')}}" class="nav-link" data-animate="scrolling">Home</a>
                      </li>
                      <li class="nav-item">
                          <a href="{{route('home')}}/#about" class="nav-link" data-animate="scrolling">About</a>
                      </li>
                      <li class="nav-item">
                          <a href="{{route('home')}}/#service" class="nav-link" data-animate="scrolling">Service</a>
                      </li>
                      <li class="nav-item">
                          <a href="{{route('projects')}}" class="nav-link" data-animate="scrolling">Portfolio</a>
                      </li>
                      <li class="nav-item">
                          <a href="{{route('blogs')}}" class="nav-link" data-animate="scrolling">Blogs</a>
                      </li>
                      <li class="nav-item">
                          <a href="{{route('home')}}/#contact" class="nav-link" data-animate="scrolling">Contact</a>
                      </li>
                  </ul>
                  <ul class="nav ml-auto">
                      <li class="nav-item">
                          @if (Auth::guard('site')->check())
                              <a href="{{route('profile')}}" data-animate="scrolling" class="text-light">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                      <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                      <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                                  </svg>
                              </a> |
                              <a href="{{route('logout')}}" data-animate="scrolling" class="text-light">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                      <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                                      <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                                  </svg>
                              </a>
                          @else
                              <a href="{{route('register')}}" data-animate="scrolling" class="text-light">
                                  Sign in/ Sing up
                              </a>
                          @endif
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
