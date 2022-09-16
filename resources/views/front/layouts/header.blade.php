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
                          <a href="#" class="nav-link" data-animate="scrolling">Home</a>
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
                          <a href="{{route('blogs')}}" class="nav-link" data-animate="scrolling">Blog</a>
                      </li>
                      <li class="nav-item">
                          <a href="{{route('home')}}/#contact" class="nav-link" data-animate="scrolling">Contact</a>
                      </li>
                  </ul>
                  <ul class="nav ml-auto">
                      <li class="nav-item">
                          <a href="{{route('register')}}" data-animate="scrolling" class="text-light">
                              Sign in/ Sing up
                          </a>
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
