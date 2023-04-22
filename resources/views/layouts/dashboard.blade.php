<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport"
    content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
    crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard.css') }}">
  <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
  <title>Portfolio Dashboard</title>
</head>

<body id="body-pd">
  <header class="header" id="header">
    <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i>
    </div>
  </header>
  <div class="l-navbar" id="nav-bar">
    <nav class="nav">
      <div>
        <a href="{{ route('details.index') }}" class="nav_logo">
          <i class='bx bx-cylinder nav_logo-icon'></i>
          <span class="nav_logo-name">Dashboard</span>
        </a>
        <div class="nav_list">
          <a href="{{ route('details.index') }}"
            class="nav_link @yield('details-active')">
            <i class='bx bx-grid-alt nav_icon'></i>
            <span class="nav_name">Details</span>
          </a>
          <a href="{{ route('slider.index') }}"
            class="nav_link @yield('slider-active')">
            <i class='bx bx-image-alt nav_icon'></i>
            <span class="nav_name">Sliders</span>
          </a>
          <a href="{{ route('skills.index') }}"
            class="nav_link @yield('skills-active')">
            <i class='bx bx-code nav_icon'></i>
            <span class="nav_name">Skills</span>
          </a>
          <a href="{{ route('experience.index') }}"
            class="nav_link @yield('experience-active')">
            <i class='bx bx-briefcase nav_icon'></i>
            <span class="nav_name">Experience</span>
          </a>
          <a href="{{ route('footer.index') }}"
            class="nav_link @yield('footer-active')">
            <i class='bx bx-text'></i>
            <span class="nav_name">Footer</span>
          </a>
        </div>
      </div> <a href="#" class="nav_link"> <i
          class='bx bx-log-out nav_icon'></i> <span class="nav_name">Back to
          Portfolio</span> </a>
    </nav>
  </div>
  <!--Container Main start-->

  <div class="text-center mt-6">
    <h4>@yield('title')</h4>
  </div>
  @yield('content')

  <!--Container Main end-->

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
  <script src="{{ asset('js/dashboard_sidebar.js') }}"></script>
</body>

</html>
