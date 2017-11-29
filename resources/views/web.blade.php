<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.ico') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Sistem Informasi Barang</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/paper-kit.css?v=2.0.1') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/css/demo.css') }}" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,300,700' rel='stylesheet' type='text/css'>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />

    <link rel="stylesheet" type="text/css" href="{{ asset('DataTables/datatables.css') }}">

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
                <a class="navbar-brand" href="#top">
                    <img style="width: 30px" src="{{ asset('images/pos_indonesia.png') }}">  Sistem Informasi Barang
                </a>
            </div>
            <div class="collapse navbar-collapse" id="navbarToggler">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" title="Tabel Barang" href="#tabel_barang">
                            Tabel Barang
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" title="Tabel Mitra" href="#tabel_mitra">
                            Info Mitra
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" title="Tabel Mitra" href="#kamus_istilah">
                            Kamus Istilah
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" title="Kotak Pesan" href="#kotak_pesan">
                            Kotak Pesan
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Lainnya</a>
                        <ul class="dropdown-menu dropdown-menu-right dropdown-danger">
                            <li class="dropdown-header" href="#pk">Fitur Lainnya</li>
                            <li class="dropdown-item"><a href="http://www.posindonesia.co.id/tnt/?ii=tarif-kiriman" target="_blank">Tarif Kiriman</a></li>
                            <li class="dropdown-item"><a href="http://www.posindonesia.co.id/tnt/?ii=lacak-kiriman" target="_blank">Lacak Kiriman</a></li>
                            <li class="dropdown-item"><a href="http://ems.posindonesia.co.id/" target="_blank">EMS Pos Indonesia</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="wrapper">
        <div class="page-header section-dark" style="background-image: url({{ asset('assets/img/packingservice.jpg') }})" id="top">
            <div class="filter"></div>
    		<div class="content-center">
    			<div class="container">
    				<div class="title-brand">
    					<img style="width: 350px" src="{{ asset('images/pos_indonesia.png') }}">
    				</div>

    				<h2 class="presentation-subtitle text-center">SISTEM INFORMASI BARANG</h2>
    			</div>
    		</div>
            <div class="moving-clouds" style="background-image: url({{ asset('assets/img/clouds.png') }}); ">

            </div>
    	</div>
        <div class="main">
            <div class="section section-buttons" id="tabel_barang">
                <div class="container">
                    <div class="tim-title text-center">
                        <nav class="navbar bg-danger">
                            <div class="container">
                                <span class="navbar-brand text-center">Tabel Informasi Barang</span>
                            </div>
                        </nav>
                    </div>
                  <table id="table1" class="table table-striped datatable responsive align-middle bordered compact">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Dokumen Pendukung</th>
                        <th>Pengeluar Dokumen</th>
                        <th>Moda Transportasi</th>
                        <th>Tujuan</th>
                        <th><i>Tags</i></th>
                        <th>Keterangan</th>
                        <th>Detil</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($datas as $data)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->nama_barang }}</td>
                        <td>
                          @foreach($data->dokumens as $dokumen)
                            {{ $dokumen->nama_dokumen }} , 
                          @endforeach
                        </td>
                        <td>
                          @foreach($data->dokumens as $dokumen)
                            {{ $dokumen->pengeluar_dokumen }} , 
                          @endforeach
                        </td>
                        <td>
                          @foreach($data->transportasis as $transportasi)
                            {{ $transportasi->moda_transportasi }} , 
                          @endforeach
                        </td>
                        <td>
                          @if($data->tujuan==1)
                          DN
                          @else
                          LN
                          @endif
                        </td>
                        <td>
                          @foreach($data->tags as $tag)
                            {{ $tag->nama_tag }} ,
                          @endforeach
                        </td>
                        <td>{{ $data->keterangan }}</td>
                        <td>
                            <button type="button" class="btn btn-outline-danger btn-round" data-toggle="modal" data-target="#modalDetil{{$data->id}}">
                                Detil
                            </button>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <div class="container" id="tabel_mitra">
                    <div class="tim-title text-center">
                        <nav class="navbar bg-danger">
                            <div class="container">
                                <a href="#" id="mitra"><span class="navbar-brand text-center">
                                    Tabel Informasi Mitra <i class="fa fa-chevron-down"></i>
                                </span></a>
                            </div>
                        </nav>
                    </div>
                    <div id="mitratable" style="display: none;">
                      <table id="table2" class="table table-striped datatable responsive align-middle bordered compact">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama Mitra</th>
                            <th>Alamat</th>
                            <th>Telpon</th>
                            <th>Fax</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($mitras as $data)
                          <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->nama_mitra }}</td>
                            <td>{{ $data->alamat }}</td>
                            <td>{{ $data->telp }}</td>
                            <td>{{ $data->fax }}</td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                </div>
                <div class="container" id="kamus_istilah">
                    <div class="tim-title text-center">
                        <nav class="navbar bg-danger">
                            <div class="container">
                                <a href="#" id="kamus"><span class="navbar-brand text-center">
                                    Tabel Kamus Istilah <i class="fa fa-chevron-down"></i>
                                </span></a>
                            </div>
                        </nav>
                    </div>
                    <div id="kamustable" style="display: none;">
                      <table id="table3" class="table table-striped datatable responsive align-middle bordered">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama Kata</th>
                            <th>Arti Kata</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($kamuses as $data)
                          <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->nama_kata }}</td>
                            <td>{{ $data->arti_kata }}</td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                </div>
            </div>   
            <div class="section section-image section-login" style="background-image: url({{ asset('assets/img/indonesia.png') }});" id="kotak_pesan">
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
                                <p class="text-center">Silahkan masukkan pesan jika ada kesalahan dan/atau kekurangan data pada tabel.</p>
                                <p class="text-center">Pesan akan disampaikan langsung ke admin aplikasi ini.</p>
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
                        <li><a href="{{ route('login') }}" target="_blank">Login Admin</a></li>
                    </ul>
                </nav>
                <div class="credits ml-auto">
                    <span class="copyright">
                        © <script>document.write(new Date().getFullYear())</script><a href="http://farizky.xyz" target="_blank"> Broadwell-</a>
                    </span>
                </div>
            </div>
        </div>
    </footer>
</body>

@foreach($datas as $data)
<!-- modalDetil -->
<div class="modal fade" id="modalDetil{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalLabel"><strong>Detil Informasi</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-3">Nama Barang</div>
                    <div class="col-sm-9">
                        <strong>:&nbsp
                         {{ $data->nama_barang }}
                        </strong><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">Packing</div>
                    <div class="col-sm-9">
                        <strong>:&nbsp
                        @foreach($data->packings as $packing)
                            {{ $packing->nama_packing }} , 
                        @endforeach
                        </strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">Dokumen</div>
                    <div class="col-sm-9">
                        <strong>:&nbsp
                        @foreach($data->dokumens as $dokumen)
                            {{ $dokumen->nama_dokumen }} , 
                        @endforeach
                        </strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">Pengeluar Dokumen</div>
                    <div class="col-sm-9">
                        <strong>:&nbsp
                        @foreach($data->dokumens as $dokumen)
                            {{ $dokumen->pengeluar_dokumen }} , 
                        @endforeach
                        </strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">Aturan</div>
                    <div class="col-sm-9">
                        <strong>:&nbsp
                        @foreach($data->aturans as $aturan)
                            {{ $aturan->isi_aturan }} , 
                        @endforeach
                        </strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">Transportasi</div>
                    <div class="col-sm-9">
                        <strong>:&nbsp
                        @foreach($data->transportasis as $transportasi)
                            {{ $transportasi->moda_transportasi }} , 
                        @endforeach
                        </strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">Tujuan</div>
                    <div class="col-sm-9">
                        <strong>:&nbsp
                        @if($data->tujuan==1)
                          DN
                        @else
                          LN
                        @endif
                        </strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">Tags</div>
                    <div class="col-sm-9">
                        <strong>:&nbsp
                        @foreach($data->tags as $tag)
                            {{ $tag->nama_tag }} , 
                        @endforeach
                        </strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">Keterangan</div>
                    <div class="col-sm-9">
                        <strong>:&nbsp
                        {{ $data->keterangan }}
                        </strong>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="left-side">
                    <button type="button" class="btn btn-default btn-link" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /modalDetil -->
@endforeach

<!-- Core JS Files -->
<script src="{{ asset('assets/js/jquery-3.2.1.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/jquery-ui-1.12.1.custom.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/tether.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}" type="text/javascript"></script>

<!-- Switches -->
<script src="{{ asset('assets/js/bootstrap-switch.min.js') }}"></script>

<!--  Plugins for Slider -->
<script src="{{ asset('assets/js/nouislider.js') }}"></script>

<!--  Plugins for DateTimePicker -->
<script src="{{ asset('assets/js/moment.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}"></script>

<!--  Paper Kit Initialization and functons -->
<script src="{{ asset('assets/js/paper-kit.js?v=2.0.1') }}"></script>

<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="{{ asset('DataTables/datatables.js') }}"></script>
<script type="text/javascript">
    $(document).ready( function () {
        $('#table1').DataTable( {
            language: {
            processing:     "Sedang memproses...",
            search:         "Pencarian&nbsp;:",
            emptyTable:     "Tabel kosong",
            lengthMenu:     "Tampilkan _MENU_ data",
            emptyTable:     "Tidak ada data pada tabel",
            info:           "Menampilkan _START_ sampai _END_ data dari total data _TOTAL_",
            infoEmpty:      "Menampilkan 0 sampai 0 data dari total data 0",
            paginate: {
                "first":      "Pertama",
                "last":       "Terakhir",
                "next":       "Selanjutnya",
                "previous":   "Sebelumnya"
            },
            }
        });
    } );
    $(document).ready( function () {
        $('#table2').DataTable( {
            language: {
            processing:     "Sedang memproses...",
            search:         "Pencarian&nbsp;:",
            emptyTable:     "Tabel kosong",
            lengthMenu:     "Tampilkan _MENU_ data",
            emptyTable:     "Tidak ada data pada tabel",
            info:           "Menampilkan _START_ sampai _END_ data dari total data _TOTAL_",
            infoEmpty:      "Menampilkan 0 sampai 0 data dari total data 0",
            paginate: {
                "first":      "Pertama",
                "last":       "Terakhir",
                "next":       "Selanjutnya",
                "previous":   "Sebelumnya"
            },
            }
        });
    } );
    $(document).ready( function () {
        $('#table3').DataTable( {
            language: {
            processing:     "Sedang memproses...",
            search:         "Pencarian&nbsp;:",
            emptyTable:     "Tabel kosong",
            lengthMenu:     "Tampilkan _MENU_ data",
            emptyTable:     "Tidak ada data pada tabel",
            info:           "Menampilkan _START_ sampai _END_ data dari total data _TOTAL_",
            infoEmpty:      "Menampilkan 0 sampai 0 data dari total data 0",
            paginate: {
                "first":      "Pertama",
                "last":       "Terakhir",
                "next":       "Selanjutnya",
                "previous":   "Sebelumnya"
            },
            }
        });
    } );
</script>

<!-- Toggle Hide/Show -->
<script type="text/javascript">
    $(function() {
        $('a#mitra').click(function() {
            $('div#mitratable').toggle(500);
            return false;
        });
    });
    $(function() {
        $('a#kamus').click(function() {
            $('div#kamustable').toggle(500);
            return false;
        });
    });
</script>

</html>