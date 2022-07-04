<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
  <meta name="keywords" content="Elmar, Elmar Aliyev, Back End Developer">
  
  <title>@yield('title', 'Elmar Aliyev')</title>

  <link rel="shortcut icon" href="front/assets/favicon.ico" type="image/x-icon">
  
  <link rel="stylesheet" type="text/css" href="front/assets/css/themify-icons.css">
  
  <link rel="stylesheet" type="text/css" href="front/assets/css/bootstrap.css">

  <link rel="stylesheet" type="text/css" href="front/assets/vendor/animate/animate.css">
  
  <link rel="stylesheet" type="text/css" href="front/assets/vendor/owl-carousel/owl.carousel.css">
  
  <link rel="stylesheet" type="text/css" href="front/assets/vendor/perfect-scrollbar/css/perfect-scrollbar.css">
  
  <link rel="stylesheet" type="text/css" href="front/assets/vendor/nice-select/css/nice-select.css">
  
  <link rel="stylesheet" type="text/css" href="front/assets/vendor/fancybox/css/jquery.fancybox.min.css">
  
  <link rel="stylesheet" type="text/css" href="front/assets/css/virtual.css">
  
  <link rel="stylesheet" type="text/css" href="front/assets/css/topbar.virtual.css">

</head>
<body class="theme-red">
  
  <!-- Back to top button -->
  <div class="btn-back_to_top">
    <span class="ti-arrow-up"></span>
  </div>
  
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