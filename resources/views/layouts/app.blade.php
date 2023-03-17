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
    </head>

    <body>
        <header>
            <nav class="navbar navbar-expand-lg bg-light">
                <div class="container-fluid container-xxl">
                    <a class="navbar-brand" href="#">
                        <img src="{{ asset('images/virtuele-helden-navigatie-logo.png') }}" alt="Virtuele Helden Logo" class="o-nav-logo">
                    </a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Community</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Trainingen</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">VH Events</a>
                        </li>
                    </ul>
                    <div class="d-flex">
                        <div>
                            <i class="fa-sharp fa-solid fa-magnifying-glass o-icon-white"></i>
                        </div>
                        <div>
                            <i class="fa-solid fa-calendar-days o-icon-white"></i>
                            <i class="fa-solid fa-globe o-icon-white"></i>
                            <i class="fa-solid fa-comment o-icon-white"></i>
                            Team 3
                        </div>
                        <div>
                            <i class="fa-sharp fa-solid fa-bars o-icon-white"></i>
                        </div>
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
