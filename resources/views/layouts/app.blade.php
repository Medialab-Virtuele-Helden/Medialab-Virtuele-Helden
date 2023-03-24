<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Virtuele Helden - Community Challenges</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Stylesheets -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    @vite(['resources/js/app.js'])

    <!-- Scripts -->
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
        tinymce.init({
            selector: '.text-editor'
        });
    </script>
  </head>

  <body>
    <header>
      <nav class="navbar navbar-expand-lg shadow">
        <div class="container-fluid container-xxl">
          <a class="navbar-brand me-5" href="#">
            <img src="{{ asset('images/virtuele-helden-navigatie-logo.png') }}" alt="Virtuele Helden Logo" class="o-nav-logo">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-5">
              <li class="nav-item me-2">
                <a class="nav-link position-relative" href="#">
                  Community
                  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    1
                  <span class="visually-hidden">unread messages</span>
                </a>
              </li>
              <li class="nav-item me-2">
                <a class="nav-link" href="#">Trainingen</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">VH Events</a>
              </li>
            </ul>
            <div class="d-flex">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-5">
                <li class="nav-item me-2">
                  <a class="nav-link" href="#"><i class="fa-sharp fa-solid fa-magnifying-glass o-icon-nav"></i></a>
                </li>
              </ul>

              <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-5">
                <li class="nav-item me-2">
                  <a class="nav-link" href="#"><i class="fa-solid fa-calendar-days o-icon-nav"></i></a>
                </li>
                <li class="nav-item me-2">
                  <a class="nav-link" href="#"><i class="fa-solid fa-globe o-icon-nav"></i></a>
                </li>
                <li class="nav-item me-2">
                  <a class="nav-link" href="#"><i class="fa-solid fa-comment o-icon-nav"></i></a>
                </li>
              </ul>

              <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-5">
                <li class="nav-item d-flex">
                  <img src="{{ asset('images/user-avatar.png') }}" alt="User avatar" class="o-nav-user">
                  <a class="nav-link" href="#">Team 3</a>
                </li>
              </ul>
                        
              <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-5">
                <li class="nav-item me-2">
                  <a class="nav-link" href="#"><i class="fa-sharp fa-solid fa-bars o-icon-nav"></i></a>
                </li>
              </ul>
                        
              <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-5">
                <li class="nav-item me-2">
                  @if (Route::has('login'))
                    @auth
                    <!-- if user is not logged in, show login/register -->
                    <li>
                      <a class="nav-link" href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                        <i class="bi bi-box-arrow-left"></i> {{ __('Logout') }}
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                      </form>
                    </li>
                  @else
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link">Login</a>
                    </li>
                    <!-- if user is logged in, show user/profile link -->
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a href="{{ route('register') }}" class="nav-link">Register</a>
                        </li>
                    @endif
                  @endauth
                  @endif
                </li>
              </ul>
            </div>
          </div>
        </div>
      </nav>
    </header>
        
    @yield('content')

    <footer></footer>
  </body>

  <script src="https://kit.fontawesome.com/3c25728907.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</html>