<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title>Sistem Informasi Barang</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width">
  <link rel="shortcut icon" href="/favicon.ico">

  <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

  @stack('stylesheets')

  <!-- build:css({.tmp,app}) styles/app.min.css -->
  <link rel="stylesheet" href="{{ asset("vendor/bootstrap/dist/css/bootstrap.css") }}">
  <link rel="stylesheet" href="{{ asset("vendor/perfect-scrollbar/css/perfect-scrollbar.css") }}">
  <link rel="stylesheet" href="{{ asset("styles/roboto.css") }}">
  <link rel="stylesheet" href="{{ asset("styles/font-awesome.css") }}">
  <link rel="stylesheet" href="{{ asset("styles/panel.css") }}">
  <link rel="stylesheet" href="{{ asset("styles/feather.css") }}">
  <link rel="stylesheet" href="{{ asset("styles/animate.css") }}">
  <link rel="stylesheet" href="{{ asset("styles/urban.css") }}">
  <link rel="stylesheet" href="{{ asset("styles/urban.skins.css") }}">
  <!-- endbuild -->

</head>

<body>

  <div class="app layout-fixed-header">

    @include('includes/sidebar')

    <!-- content panel -->
    <div class="main-panel">

      @include('includes/topbar')

      @yield('main_container')

    </div>
    <!-- /content panel -->

    @include('includes/footer')

  </div>

  <!-- build:js({.tmp,app}) scripts/app.min.js -->
  <script src="{{ asset("scripts/extentions/modernizr.js") }}"></script>
  <script src="{{ asset("vendor/jquery/dist/jquery.js") }}"></script>
  <script src="{{ asset("vendor/bootstrap/dist/js/bootstrap.js") }}"></script>
  <script src="{{ asset("vendor/jquery.easing/jquery.easing.js") }}"></script>
  <script src="{{ asset("vendor/fastclick/lib/fastclick.js") }}"></script>
  <script src="{{ asset("vendor/onScreen/jquery.onscreen.js") }}"></script>
  <script src="{{ asset("vendor/jquery-countTo/jquery.countTo.js") }}"></script>
  <script src="{{ asset("vendor/perfect-scrollbar/js/perfect-scrollbar.jquery.js") }}"></script>
  <script src="{{ asset("scripts/ui/accordion.js") }}"></script>
  <script src="{{ asset("scripts/ui/animate.js") }}"></script>
  <script src="{{ asset("scripts/ui/link-transition.js") }}"></script>
  <script src="{{ asset("scripts/ui/panel-controls.js") }}"></script>
  <script src="{{ asset("scripts/ui/preloader.js") }}"></script>
  <script src="{{ asset("scripts/ui/toggle.js") }}"></script>
  <script src="{{ asset("scripts/urban-constants.js") }}"></script>
  <script src="{{ asset("scripts/extentions/lib.js") }}"></script>
  <!-- endbuild -->

@stack('scripts')

</body>

</html>