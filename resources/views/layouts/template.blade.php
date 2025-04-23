<!DOCTYPE html>
<html lang="zxx">

<head>
  <meta charset="utf-8" />
  <title>EcoMercado Universitario</title>

  <!--Meta For No Index-->
  <meta name="robots" content="noindex, Nofollow, Noimageindex">

  <!-- mobile responsive meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

  <!-- Theme Stylesheet -->
  <link href="{{ asset('css/style.css') }}" rel="stylesheet" />

  <!--Favicon-->
  <link rel="shortcut icon" href="images/favicon.svg" type="image/x-icon" />
  <link rel="icon" href="{{ asset('images/favicon.svg') }}" type="image/x-icon" />
</head>

<body>

<!-- Navbar Start -->
<nav class="main-nav navbar navbar-expand-lg">
  <div class="container">
    <!-- Logo -->
    <a class="navbar-brand text-dark fw-bold" href="{{ route('home') }}"> 
      EcoMercado Universitario
    </a>
    <!-- Toogle Button -->
    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#mainNav">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <div class="collapse navbar-collapse nav-list" id="mainNav">
      <!-- Navigation Links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('home') }}">Home </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.html">Productos </a>
        </li>
      </ul>
      <!-- Social Link -->
      <ul class="main-nav-social">
        <li>
          <a href="#"><i class="fa fa-facebook"></i></a>
        </li>
        <li>
          <a href="#"><i class="fa fa-twitter"></i></a>
        </li>
        <li>
          <a href="#"><i class="fa fa-instagram"></i></a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- Navbar End -->

<!-- Main Content Start -->
<main class="py-f4">
    @yield('content')
</main>

<!-- Main Content End -->


<section class="footer border-top">
<div class="container-fluid">
  <div class="row justify-content-center text-center">
    <!-- Logo -->
    <div class="col-lg-4">
      <div class="footer-logo">
        <a class="navbar-brand text-dark fw-bold" href="{{ route('home') }}"> 
          EcoMercado Universitario
        </a>
      </div>
    </div>
  </div>

  <div class="row justify-content-center text-center">
    <!-- Navegación -->
    <div class="col-lg-4">
      <div class="footer-nav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.html">Productos</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>


    <div class="row">
      <div class="col-lg-12">
        <div class="copy-right">
          <p>© Copyright <span id="copyrightYear"></span> - EcoMercado CUCEI</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Vendor JS -->
<script src="{{ asset('vendor/jQuery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ asset('vendor/slick/slick.min.js') }}"></script>
<script src="{{ asset('vendor/g-map/gmap.js') }}"></script>
<!-- Main JS -->
<script src="{{ asset('js/script.js') }}"></script>
</body>

</html>