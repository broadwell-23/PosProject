<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Sistem Informasi Barang</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/paper-kit.css?v=2.0.1" rel="stylesheet"/>
    <link href="assets/css/demo.css" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <!-- <link href='http://fonts.googleapis.com/css?family=Montserrat:400,300,700' rel='stylesheet' type='text/css'>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet"> -->
    <link href="assets/css/nucleo-icons.css" rel="stylesheet" />

    <link rel="stylesheet" type="text/css" href="/DataTables/datatables.css">

</head>

<body>
    <nav class="navbar navbar-toggleable-md fixed-top navbar-transparent" color-on-scroll="500">
        <div class="container">
            <div class="navbar-translate">
                <button class="navbar-toggler navbar-toggler-right navbar-burger" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar"></span>
                    <span class="navbar-toggler-bar"></span>
                    <span class="navbar-toggler-bar"></span>
                </button>
                <a class="navbar-brand" href="/">Pos Indonesia</a>
            </div>
            <div class="collapse navbar-collapse" id="navbarToggler">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" title="Tabel Barang" href="#tabel_barang">
                            Tabel Barang
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" title="Kotak Pesan" href="#kotak_pesan">
                            Kotak Pesan
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="wrapper">
        <div class="page-header section-dark" style="background-image: url('assets/img/antoine-barres.jpg')">
            <div class="filter"></div>
    		<div class="content-center">
    			<div class="container">
    				<div class="title-brand">
    					<h1 class="presentation-title">Pos Indonesia</h1>
    				</div>

    				<h2 class="presentation-subtitle text-center">Sistem Informasi Barang</h2>
    			</div>
    		</div>
            <div class="moving-clouds" style="background-image: url('assets/img/clouds.png'); ">

            </div>
    	</div>
        <div class="main">
            <div class="section section-buttons" id="tabel_barang">
                <div class="container">
                    <div class="tim-title text-center">
                        <h3>Tabel Informasi Barang</h3>
                    </div>
                  <table id="table1" class="table table-striped datatable responsive align-middle bordered">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th><i>Packing</i></th>
                        <th>Dokumen Pendukung</th>
                        <th>Pengeluar Dokumen</th>
                        <th>Aturan</th>
                        <th><i>Tags</i></th>
                        <th>Keterangan</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($datas as $no => $data)
                      <tr>
                        <td>{{ $no+1 }}</td>
                        <td>{{ $data->nama_barang }}</td>
                        <td>
                          @foreach($data->packings()->get() as $packing)
                            <span class="label label-danger">{{ $packing->nama_packing }}</span><br>
                          @endforeach
                        </td>
                        <td>
                          @foreach($data->dokumens()->get() as $dokumen)
                            <span class="label label-default">{{ $dokumen->nama_dokumen }}</span><br>
                          @endforeach
                        </td>
                        <td>
                          @foreach($data->dokumens()->get() as $dokumen)
                            <span class="label label-default">{{ $dokumen->pengeluar_dokumen }}</span><br>
                          @endforeach
                        </td>
                        <td>
                          @foreach($data->aturans()->get() as $aturan)
                            {{ $aturan->isi_aturan }}<br>
                          @endforeach
                        </td>
                        <td>
                          @foreach($data->tags()->get() as $tag)
                            <span class="label label-primary">{{ $tag->nama_tag }}</span><br>
                          @endforeach
                        </td>
                        <td>{{ $data->keterangan }}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
            </div>    
            <div class="section section-image section-login" style="background-image: url('assets/img/login-image.jpg');" id="kotak_pesan">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            @if(session()->get('message')=="bTambah")
                            <!-- Success Alert -->
                            <div class="alert alert-success alert-with-icon" data-notify="container">
                                <div class="container">
                                    <div class="alert-wrapper">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <i class="nc-icon nc-simple-remove"></i>
                                        </button>
                                        <div class="message"><i class="nc-icon nc-bell-55"></i> Pesan telah <strong>terkirim</strong>.</div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Success Alert -->
                            {{session()->forget('message')}}
                            @endif
                            <div class="card contact-form">
                                <h3 class="tim-title text-center">Kotak Pesan</h3>
                                <p class="text-center">Silahkan masukkan saran jika ada kesalahan dan/atau kekurangan data pada tabel.</p>
                                <p class="text-center">Saran akan disampaikan langsung ke admin aplikasi ini.</p>
                                <form method="POST" class="contact-form" role="form">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-10">
                                            <label>Nama</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="nc-icon nc-single-02"></i>
                                                </span>
                                                <input name="nama" type="text" class="form-control" placeholder="Nama" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-10">
                                            <label>Pesan</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="nc-icon nc-email-85"></i>
                                                </span>
                                                <input name="isi_pesan" type="text" class="form-control" placeholder="Pesan" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4 offset-md-4">
                                            <button type="submit" class="btn btn-danger btn-lg btn-fill">Kirim Pesan</button>
                                        </div>
                                    </div><br>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <footer class="footer">
        <div class="container">
            <div class="row">
                <nav class="footer-nav">
                    <ul>
                        <li><a href="/login">Login Admin</a></li>
                    </ul>
                </nav>
                <div class="credits ml-auto">
                    <span class="copyright">
                        © <script>document.write(new Date().getFullYear())</script> Broadwell-
                    </span>
                </div>
            </div>
        </div>
    </footer>
</body>

<!-- Core JS Files -->
<script src="assets/js/jquery-3.2.1.js" type="text/javascript"></script>
<script src="assets/js/jquery-ui-1.12.1.custom.min.js" type="text/javascript"></script>
<script src="assets/js/tether.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

<!-- Switches -->
<script src="assets/js/bootstrap-switch.min.js"></script>

<!--  Plugins for Slider -->
<script src="assets/js/nouislider.js"></script>

<!--  Plugins for DateTimePicker -->
<script src="assets/js/moment.min.js"></script>
<script src="assets/js/bootstrap-datetimepicker.min.js"></script>

<!--  Paper Kit Initialization and functons -->
<script src="assets/js/paper-kit.js?v=2.0.1"></script>

<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="/DataTables/datatables.js"></script>
<script type="text/javascript">
    $(document).ready( function () {
        $('#table1').DataTable();
    } );
</script>

</html>