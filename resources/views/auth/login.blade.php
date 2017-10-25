<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title>Sistem Informasi Barang</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width">
  <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

  <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

  <!-- page level plugin styles -->
  <!-- /page level plugin styles -->

  <!-- build:css({.tmp,app}) styles/app.min.css -->
  <link rel="stylesheet" href="{{ asset('vendor/bootstrap/dist/css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/perfect-scrollbar/css/perfect-scrollbar.css') }}">
  <link rel="stylesheet" href="{{ asset('styles/roboto.css') }}">
  <link rel="stylesheet" href="{{ asset('styles/font-awesome.css') }}">
  <link rel="stylesheet" href="{{ asset('styles/panel.css') }}">
  <link rel="stylesheet" href="{{ asset('styles/feather.css') }}">
  <link rel="stylesheet" href="{{ asset('styles/animate.css') }}">
  <link rel="stylesheet" href="{{ asset('styles/urban.css') }}">
  <link rel="stylesheet" href="{{ asset('styles/urban.skins.css') }}">
  <!-- endbuild -->

</head>

<body>

  <div class="app layout-fixed-header bg-white usersession">
    <div class="full-height">
      <div class="center-wrapper">
        <div class="center-content">
          <div class="row no-margin">
            <div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
              <form method="POST" role="form" action="{{ route('login') }}" class="form-layout">
                {{ csrf_field() }}
                <a href="{{ route('home') }}">
                  <div class="text-center mb15">
                    <img style="width: 230px" src="{{ asset('images/pos_indonesia.png') }}" />
                  </div>
                  <h5 class="text-center mb30"><strong>SISTEM INFORMASI BARANG</strong></h5>
                </a>
                <div class="form-inputs">
                  <input name="email" type="email" class="form-control input-lg" placeholder="Email Address" required>
                  <input name="password" type="password" class="form-control input-lg" placeholder="Password" required>
                </div>
                <button class="btn btn-success btn-block btn-lg mb15" type="submit">
                  <span>Log in</span>
                </button>
                <a href="{{ route('home') }}"><i class="fa fa-chevron-left"></i> Beranda</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- build:js({.tmp,app}) scripts/app.min.js -->
  <script src="{{ asset('scripts/extentions/modernizr.js') }}"></script>
  <script src="{{ asset('vendor/jquery/dist/jquery.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/dist/js/bootstrap.js') }}"></script>
  <script src="{{ asset('vendor/jquery.easing/jquery.easing.js') }}"></script>
  <script src="{{ asset('vendor/fastclick/lib/fastclick.js') }}"></script>
  <script src="{{ asset('vendor/onScreen/jquery.onscreen.js') }}"></script>
  <script src="{{ asset('vendor/jquery-countTo/jquery.countTo.js') }}"></script>
  <script src="{{ asset('vendor/perfect-scrollbar/js/perfect-scrollbar.jquery.js') }}"></script>
  <script src="{{ asset('scripts/ui/accordion.js') }}"></script>
  <script src="{{ asset('scripts/ui/animate.js') }}"></script>
  <script src="{{ asset('scripts/ui/link-transition.js') }}"></script>
  <script src="{{ asset('scripts/ui/panel-controls.js') }}"></script>
  <script src="{{ asset('scripts/ui/preloader.js') }}"></script>
  <script src="{{ asset('scripts/ui/toggle.js') }}"></script>
  <script src="{{ asset('scripts/urban-constants.js') }}"></script>
  <script src="{{ asset('scripts/extentions/lib.js') }}"></script>
  <!-- endbuild -->
</body>

</html>