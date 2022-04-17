<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{ $title }} | {{ env('APP_NAME') }} - {{ env('VILLAGE_NAME') }}</title>
  <meta content="{{ env('VILLAGE_NAME') }} {{ env('VILLAGE_DISTRICT') }}  {{ env('VILLAGE_CITY') }}" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('template/img/logo-ppu.png')}}" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('template/landing-page/assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('template/landing-page/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('template/landing-page/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('template/landing-page/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('template/landing-page/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('template/landing-page/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('template/landing-page/assets/css/style.css')}}" rel="stylesheet">
  
  <!-- =======================================================
  * Template Name: BizLand - v3.7.0
  * Template URL: https://bootstrapmade.com/bizland-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

  <style>
    .logo-description{
      font-size: 10px; 
      margin-bottom:0;
    }

    #hero h2{
      margin-bottom: 0;
      font-size: 20px;
    }

    .error-text{
      color: #dc3545;
      font-size: 15px;
      margin-bottom: 0;
    }

  </style>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">
			<h1 class="logo">
				<a href="#">{{ env('APP_NAME') }}</a><br>
				<p class="logo-description"><i>{{ env('APP_DESC') }}</i></p>
        <p class="logo-description"><i>{{ env('VILLAGE_NAME') }} {{ env('VILLAGE_CITY') }}</i></p>
			</h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="#" class="logo"><img src="assets/img/logo.png" alt=""></a> -->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto {{ Route::is('/') ? 'active' : '' }}" href="/#hero">Beranda</a></li>
          <li><a class="nav-link scrollto" href="#tentang-kami">Tentang Kami</a></li>
          <li><a class="nav-link scrollto" href="#contact">Kontak</a></li>
          <li><a class="nav-link {{ Route::is('login') ? 'active' : '' }}" href="{{ route('login') }}">Masuk</a></li>
          <li><a class="nav-link {{ Route::is('register') ? 'active' : '' }}" href="{{ route('register') }}">Daftar</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  @yield('content')
  
  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container py-4">
      <div class="copyright">
        &copy; Copyright <strong><span>{{ env('APP_NAME') }}</span></strong> {{ env('VILLAGE_NAME') }}. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/bizland-bootstrap-business-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->
  
  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('template/landing-page/assets/vendor/purecounter/purecounter.js')}}"></script>
  <script src="{{asset('template/landing-page/assets/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('template/landing-page/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('template/landing-page/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('template/landing-page/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('template/landing-page/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('template/landing-page/assets/vendor/waypoints/noframework.waypoints.js')}}"></script>
  <script src="{{asset('template/landing-page/assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('template/landing-page/assets/js/main.js')}}"></script>

</body>

</html>