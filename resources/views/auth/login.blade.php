<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title>Sistem Informasi Barang</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width">
  <link rel="shortcut icon" href="/favicon.ico">

  <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

  <!-- page level plugin styles -->
  <!-- /page level plugin styles -->

  <!-- build:css({.tmp,app}) styles/app.min.css -->
  <link rel="stylesheet" href="vendor/bootstrap/dist/css/bootstrap.css">
  <link rel="stylesheet" href="vendor/perfect-scrollbar/css/perfect-scrollbar.css">
  <link rel="stylesheet" href="styles/roboto.css">
  <link rel="stylesheet" href="styles/font-awesome.css">
  <link rel="stylesheet" href="styles/panel.css">
  <link rel="stylesheet" href="styles/feather.css">
  <link rel="stylesheet" href="styles/animate.css">
  <link rel="stylesheet" href="styles/urban.css">
  <link rel="stylesheet" href="styles/urban.skins.css">
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
                <div class="text-center mb15">
                  <img src="images/logo-dark.png" />
                </div>
                <p class="text-center mb30">Sistem Informasi Barang . Pos Indonesia</p>
                <div class="form-inputs">
                  <input name="email" type="email" class="form-control input-lg" placeholder="Email Address">
                  <input name="password" type="password" class="form-control input-lg" placeholder="Password">
                </div>
                <button class="btn btn-success btn-block btn-lg mb15" type="submit">
                  <span>Log in</span>
                </button>
                <p>
                  Daftar? Hubungi Admin.
                </p>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- build:js({.tmp,app}) scripts/app.min.js -->
  <script src="scripts/extentions/modernizr.js"></script>
  <script src="vendor/jquery/dist/jquery.js"></script>
  <script src="vendor/bootstrap/dist/js/bootstrap.js"></script>
  <script src="vendor/jquery.easing/jquery.easing.js"></script>
  <script src="vendor/fastclick/lib/fastclick.js"></script>
  <script src="vendor/onScreen/jquery.onscreen.js"></script>
  <script src="vendor/jquery-countTo/jquery.countTo.js"></script>
  <script src="vendor/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
  <script src="scripts/ui/accordion.js"></script>
  <script src="scripts/ui/animate.js"></script>
  <script src="scripts/ui/link-transition.js"></script>
  <script src="scripts/ui/panel-controls.js"></script>
  <script src="scripts/ui/preloader.js"></script>
  <script src="scripts/ui/toggle.js"></script>
  <script src="scripts/urban-constants.js"></script>
  <script src="scripts/extentions/lib.js"></script>
  <!-- endbuild -->
</body>

</html>