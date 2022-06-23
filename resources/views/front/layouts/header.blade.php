<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
  <meta name="copyright" content="MACode ID, https://www.macodeid.com/">
  
  <title>@yield('title', 'Elmar Aliyev')</title>

  <link rel="shortcut icon" href="front/assets/favicon.ico" type="image/x-icon">
  
  <link rel="stylesheet" type="text/css" href="front/assets/css/themify-icons.css">
  
  <link rel="stylesheet" type="text/css" href="front/assets/css/bootstrap.css">

  <link rel="stylesheet" type="text/css" href="front/assets/vendor/animate/animate.css">
  
  <link rel="stylesheet" type="text/css" href="front/assets/vendor/owl-carousel/owl.carousel.css">
  
  {{-- <link rel="stylesheet" type="text/css" href="front/assets/vendor/perfect-scrollbar/css/perfect-scrollbar.css"> --}}
  
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
  
  <!-- Setting button -->
  <div class="config">
    <div class="template-config">
      <!-- Settings -->
      <div class="d-block">
        <button class="btn btn-fab btn-sm" id="sideel" title="Settings"><span class="ti-settings"></span></button>
      </div>
    </div>
    <div class="set-menu">
      <p>Select Color</p>
      <div class="color-bar" data-toggle="selected">
        <span class="color-item bg-theme-red selected" data-class="theme-red"></span>
        <span class="color-item bg-theme-blue" data-class="theme-blue"></span>
        <span class="color-item bg-theme-green" data-class="theme-green"></span>
        <span class="color-item bg-theme-orange" data-class="theme-orange"></span>
        <span class="color-item bg-theme-purple" data-class="theme-purple"></span>
      </div>
    </div>
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
            <li class="nav-item active">
              <a href="{{route('home')}}" class="nav-link" data-animate="scrolling">Home</a>
            </li>
            <li class="nav-item">
              <a href="{{route('about')}}" class="nav-link" data-animate="scrolling">About</a>
            </li>
            <li class="nav-item">
              <a href="{{route('projects')}}" class="nav-link" data-animate="scrolling">Portfolio</a>
            </li>
            <li class="nav-item">
              <a href="{{route('blogs')}}" class="nav-link" data-animate="scrolling">Blog</a>
            </li>
            <li class="nav-item">
              <a href="{{route('contact')}}" class="nav-link" data-animate="scrolling">Contact</a>
            </li>
          </ul>
          <ul class="nav ml-auto">
            <li class="nav-item">
              <button class="btn btn-fab btn-theme no-shadow">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-palette-fill" viewBox="0 0 16 16">
                  <path d="M12.433 10.07C14.133 10.585 16 11.15 16 8a8 8 0 1 0-8 8c1.996 0 1.826-1.504 1.649-3.08-.124-1.101-.252-2.237.351-2.92.465-.527 1.42-.237 2.433.07zM8 5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm4.5 3a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zM5 6.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm.5 6.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
                </svg>
              </button>
            </li>
          </ul>
        </div>
      </div>
    </div> 
    <!-- End Navbar -->