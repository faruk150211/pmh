<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>@yield('title', setting('site_name', 'Premier Medical HouseCall'))</title>
  <meta name="description" content="@yield('description', setting('site_description', 'Premier Medical Housecall provides high-quality healthcare services at home. Our experienced doctors and nurses offer convenient, compassionate care for all your medical needs.'))">
  <meta name="keywords" content="@yield('keywords', setting('seo_meta_keywords', 'medical housecall, home healthcare, doctor at home, medical services, healthcare at home'))">
  <meta name="theme-color" content="{{ setting('theme_color', '#0084d6') }}">

  <!-- Favicons -->
  <link href="{{ asset(setting('favicon_url', 'frontend/assets/img/favicon.png')) }}" rel="icon">
  <link href="{{ asset('frontend/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('frontend/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('frontend/assets/css/main.css') }}" rel="stylesheet">

  @stack('styles')

  <!-- Fixed Header Spacing -->
  <style>
    body {
      padding-top: 0;
    }

    main.main {
      padding-top: 90px;
    }

    @media (max-width: 768px) {
      main.main {
        padding-top: 70px;
      }
    }
  </style>

  <!-- =======================================================
  * Template Name: Clinic
  * Template URL: https://bootstrapmade.com/clinic-bootstrap-template/
  * Updated: Jul 23 2025 with Bootstrap v5.3.7
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  @include('frontend.layouts.header')

  <main class="main">
    @yield('content')
  </main>

  @include('frontend.layouts.footer')

  @include('frontend.layouts.contact-icons')

  <!-- Vendor JS Files -->
  <script src="{{ asset('frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('frontend/assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('frontend/assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('frontend/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('frontend/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('frontend/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

  <!-- Main JS File -->
  <script src="{{ asset('frontend/assets/js/main.js') }}"></script>

  <!-- Language Switcher Script -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Get current language from URL parameter or localStorage
      const urlParams = new URLSearchParams(window.location.search);
      const currentLang = urlParams.get('lang') || localStorage.getItem('appLanguage') || 'en';

      // Update active language link
      const langLinks = document.querySelectorAll('.language-switcher .lang-link');
      langLinks.forEach(link => {
        link.classList.remove('active');
        if (link.getAttribute('data-lang') === currentLang) {
          link.classList.add('active');
        }
      });

      // Store language preference
      localStorage.setItem('appLanguage', currentLang);
      document.documentElement.lang = currentLang;
    });
  </script>

  @stack('scripts')

</body>

</html>
