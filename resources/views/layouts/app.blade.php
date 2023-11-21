<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>SIROWP SERGAI</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('theme/assets/img/favicon/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('theme/assets/vendor/fonts/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('theme/assets/vendor/fonts/tabler-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('theme/assets/vendor/fonts/flag-icons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('theme/assets/vendor/css/rtl/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('theme/assets/vendor/css/rtl/theme-default.css') }}" />
    <link rel="stylesheet" href="{{ asset('theme/assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('theme/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('theme/assets/vendor/libs/node-waves/node-waves.css') }}" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ asset('theme/assets/vendor/js/helpers.js') }}" ></script>
    <script src="{{ asset('theme/assets/vendor/js/template-customizer.js') }}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('theme/assets/js/config.js') }}" ></script>
    @yield('styles')
  </head>


<body>
     <!-- Layout wrapper -->
  <div class="layout-wrapper layout-navbar-full layout-horizontal layout-without-menu">
    <div class="layout-container">
     

      <!-- Layout container -->
      <div class="layout-page">
        <!-- Content wrapper -->
        <div class="content-wrapper">
                @yield('content')
                 <!-- Footer -->
          <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl">
              <div
                class="footer-container d-flex align-items-center justify-content-between py-2 flex-md-row flex-column">
                <div>
                  ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  , made with ❤️ by <a href="https://pixinvent.com" target="_blank" class="fw-semibold">Pixinvent</a>
                </div>
                
              </div>
            </div>
          </footer>
          <!-- / Footer -->

          <div class="content-backdrop fade"></div>
        </div>
        <!--/ Content wrapper -->
      </div>

      <!--/ Layout container -->
    </div>
  </div>

  <!-- Overlay -->
  <div class="layout-overlay layout-menu-toggle"></div>

  <!-- Drag Target Area To SlideIn Menu On Small Screens -->
  <div class="drag-target"></div>
   
    <script src="{{ asset('theme/assets/vendor/libs/jquery/jquery.js') }}" ></script>
    <script src="{{ asset('theme/assets/vendor/libs/popper/popper.js') }}" ></script>
    <script src="{{ asset('theme/assets/vendor/js/bootstrap.js') }}" ></script>
    <script src="{{ asset('theme/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}" ></script>
    <script src="{{ asset('theme/assets/vendor/libs/node-waves/node-waves.js') }}" ></script>

    <script src="{{ asset('theme/assets/vendor/libs/hammer/hammer.js') }}" ></script>

    <script src="{{ asset('theme/assets/vendor/js/menu.js') }}" ></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="{{ asset('theme/assets/js/main.js') }}" ></script>


    <script src="{{ asset('theme/assets/vendor/libs/i18n/i18n.js') }}" ></script>
    <script src="{{ asset('theme/assets/vendor/libs/typeahead-js/typeahead.js') }}" ></script>

  
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('theme/assets/vendor/libs/swiper/swiper.js') }}" ></script>

    <!-- Main JS -->
   

    <!-- Page JS -->
    <script src="{{ asset('theme/assets/js/ui-carousel.js') }}" ></script>


    <!-- Page JS -->
    @yield('script')


</body>
</html>
