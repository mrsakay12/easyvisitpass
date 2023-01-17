<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Easy Visit Pass</title>
 
    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
    />

    <!-- AOS Animate -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />

    <!-- Box Icons CSS -->
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link rel="icon" href="{{ asset('Images/logo4.png') }}" />
    <link rel="stylesheet" href="{{ asset('css/frontend.css') }}" />
  </head>
  <body>
    <!-- Navbar Section -->
    <nav class="navbar navbar-expand-lg bg-white">
      <div class="container">
        <a class="navbar-brand" href="\home">
          <img
            src="{{ asset('/Images/logo3.png') }}"
            alt="logo"
            width="50"
          
            height="50"
            class="d-inline-block align-middle"
          />
          <span>EV</span><span class="span-pass"> - Pass</span>
        </a>
        <button
          class="navbar-toggler shadow-none"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNavAltMarkup"
          aria-controls="navbarNavAltMarkup"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <i class="bx bx-menu"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ms-auto">
            <a
              class="nav-link active"
              aria-current="page"
              href="\preregister"
              >Have Appointment</a
            >
            <a class="nav-link" href="\return">Been Here Before</a>
          </div>
          <a href="\dashboard" class="btn btn-primary shadow-none">Login</a>
        </div>
      </div>
    </nav>

    <!-- HERO SECTION -->
    @yield('content')
    <hr class="hr-line">
            <div class="d-flex justify-content-center footer-text pb-3">
                <span> @ 2023 All Rights Reserved</span>
            </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
