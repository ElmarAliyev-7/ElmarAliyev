<nav class="navbar navbar-expand-lg navbar-light bg-light pl-5 pr-5">
  <a class="navbar-brand" href="{{route('home')}}">Elmar Aliyev</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="{{route('home')}}">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('about')}}">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('projects')}}">Projects</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('blogs')}}">Blog</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('contact')}}">Contact</a>
      </li>
    </ul>
    <ul class="nav ml-auto">
      <li class="nav-item">
          <a class="nav-link" href="{{route('register')}}" data-animate="scrolling">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
              <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
              <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
            </svg>
          </a>
      </li>
    </ul>
  </div>
</nav>