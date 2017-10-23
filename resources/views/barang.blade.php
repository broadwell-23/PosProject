@extends('layouts.blank')

@section('title')

<i class="fa fa-briefcase"></i> Daftar Barang</i>

@endsection

@push('stylesheets')
<!-- page level plugin styles -->
<link rel="stylesheet" href="{{ asset('vendor/datatables/media/css/jquery.dataTables.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/chosen_v1.4.0/chosen.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/jquery.tagsinput/jquery.tagsinput.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/checkbo/src/0.1.4/css/checkBo.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/intl-tel-input/build/css/intlTelInput.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/dropzone/dist/min/basic.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/dropzone/dist/min/dropzone.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/bootstrap-daterangepicker/daterangepicker-bs3.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/clockpicker/dist/bootstrap-clockpicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/datatables/media/css/jquery.dataTables.css') }}">
<!-- /page level plugin styles -->
@endpush

@section('main_container')

<!-- main area -->
<div class="main-content">
  @if(session()->get('message')=="bTambah")
  <!-- Success Alert -->
  <div class="alert alert-success alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    Yay! Data pada aplikasi berhasil di<strong>tambah</strong>.
  </div>
  <!-- /Success Alert -->
  {{session()->forget('message')}}
  @endif
  @if(session()->get('message')=="bUbah")
  <!-- Info Alert -->
  <div class="alert alert-info alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    Yay! Data pada aplikasi berhasil di<strong>ubah</strong>.
  </div>
  <!-- /Info Alert -->
  {{session()->forget('message')}}
  @endif
  @if(session()->get('message')=="bHapus")
  <!-- Danger Alert -->
  <div class="alert alert-danger alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    Yay! Data pada aplikasi berhasil di<strong>hapus</strong>.
  </div>
  <!-- /Danger Alert -->
  {{session()->forget('message')}}
  @endif
  <div class="panel">
    <div class="panel-heading border">
      <ol class="breadcrumb mb0 no-padding">
        <li>
          <a href="dashboard">Admin Panel</a>
        </li>
        <li>
          <a href="#">Informasi Barang</a>
        </li>
        <li class="active">Daftar Barang</li>
      </ol>
    </div>
    <div class="panel-heading">
      <a href="/barang/tambah">
        <button type="button" class="btn btn-success btn-round btn-icon" style="float: right">
          <i class="fa fa-plus"></i>
          <span>Tambah Data</span>
        </button>
      </a>
    </div>
    <div class="panel-body">
      <table class="table table-striped datatable editable-datatable responsive align-middle bordered">
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
            <th></th>
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
            <td class="text-center">
              <a href="/barang/ubah/{{$data->id}}">
                <button type="button" class="btn btn-info btn-outline btn-xs" data-toggle="modal">
                  <i class="fa fa-pencil"></i>
                </button>
              </a>
              <button data-target="#modalHapus{{$data->id}}" class="btn btn-danger btn-outline btn-xs" data-toggle="modal"><i class="fa fa-trash"></i></button>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- /main area -->

@foreach($datas as $data)
<!-- modalHapus -->
<div id="modalHapus{{$data->id}}" class="modal bs-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="panel panel-danger">
          <div class="panel-heading">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">Hapus Barang</h4>
          </div>
        </div>
      <div class="modal-body">
        <form method="POST" class="form-horizontal" role="form">
          <input type="hidden" name="id" value="{{ $data->id }}">
          {{ method_field('DELETE') }} 
          {{ csrf_field() }}       
          <center>Data <strong>{{ $data->nama_barang }}</strong> Akan Dihapus, Apakah Anda Yakin?</center>
        </div>
        <div class="modal-footer bordered">
          <button type="button" class="btn btn-default btn-outline btn-round" data-dismiss="modal">Tidak</button>
          <button type="submit" class="btn btn-danger btn-outline btn-round">Ya</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- /modalHapus -->
@endforeach

@endsection

@push('scripts')
<!-- page level scripts -->
<script src="{{ asset('vendor/datatables/media/js/jquery.dataTables.js') }}"></script>
<!-- /page level scripts -->

<!-- initialize page scripts -->
<script src="{{ asset('scripts/extentions/bootstrap-datatables.js') }}"></script>
<script src="{{ asset('scripts/pages/table-edit.js') }}"></script>
<!-- /initialize page scripts -->

<!-- page level scripts -->
<script src="{{ asset('vendor/chosen_v1.4.0/chosen.jquery.min.js') }}"></script>
<script src="{{ asset('vendor/jquery.tagsinput/jquery.tagsinput.min.js') }}"></script>
<script src="{{ asset('vendor/checkbo/src/0.1.4/js/checkBo.min.js') }}"></script>
<script src="{{ asset('vendor/intl-tel-input//build/js/intlTelInput.min.js') }}"></script>
<script src="{{ asset('vendor/dropzone/dist/min/dropzone.min.js') }}"></script>
<script src="{{ asset('vendor/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('vendor/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('vendor/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
<script src="{{ asset('vendor/clockpicker/dist/jquery-clockpicker.min.js') }}"></script>
<script src="{{ asset('vendor/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js') }}"></script>
  <!-- /page level scripts -->

<!-- initialize page scripts -->
<script src="{{ asset('scripts/pages/form-custom.js') }}"></script>
<!-- /initialize page scripts -->
@endpush