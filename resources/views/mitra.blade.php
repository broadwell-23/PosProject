@extends('layouts.blank')

@section('title')

<i class="fa fa-institution"></i> Daftar Mitra

@endsection

@push('stylesheets')
<!-- page level plugin styles -->
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
  <!-- Success Alert -->
  <div class="alert alert-info alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    Yay! Data pada aplikasi berhasil di<strong>ubah</strong>.
  </div>
  <!-- /Success Alert -->
  {{session()->forget('message')}}
  @endif
  @if(session()->get('message')=="bHapus")
  <!-- Success Alert -->
  <div class="alert alert-danger alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    Yay! Data pada aplikasi berhasil di<strong>hapus</strong>.
  </div>
  <!-- /Success Alert -->
  {{session()->forget('message')}}
  @endif
  <div class="panel">
    <div class="panel-heading border">
      <ol class="breadcrumb mb0 no-padding">
        <li>
          <a href="dashboard">Admin Panel</a>
        </li>
        <li class="active">Mitra</li>
      </ol>
    </div>
    <div class="panel-heading">
      <button data-target="#modalTambah" class="btn btn-success btn-round btn-icon" style="float: right" data-toggle="modal">
        <i class="fa fa-plus"></i>
        <span>Tambah Data</span>
      </button>
    </div>
    <div class="panel-body">
      <table class="table table-striped datatable editable-datatable responsive align-middle bordered">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Mitra</th>
            <th>Alamat</th>
            <th>Telpon</th>
            <th>Fax</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach($datas as $no => $data)
          <tr>
            <td>{{ $no+1 }}</td>
            <td>{{ $data->nama_mitra }}</td>
            <td>{{ $data->alamat }}</td>
            <td>{{ $data->telp }}</td>
            <td>{{ $data->fax }}</td>
            <td class="text-center">
              <button data-target="#modalUbah{{$data->id}}" class="btn btn-info btn-outline btn-xs" data-toggle="modal"><i class="fa fa-pencil"></i></button>
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

<!-- modalTambah -->
<div id="modalTambah" class="modal bs-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="panel panel-success">
          <div class="panel-heading">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">Tambah Mitra</h4>
          </div>
        </div>
      <div class="modal-body">
        <form method="POST" class="form-horizontal" role="form">
          {{ csrf_field() }}
          <div class="form-group">
            <label class="col-sm-2 control-label">Nama Mitra<small><sup><i class="fa fa-star" style="color: red"></i></sup></small></label>
            <div class="col-sm-9">
              <input name="nama_mitra" type="text" class="form-control" required>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Alamat<small><sup><i class="fa fa-star" style="color: red"></i></sup></small></label>
            <div class="col-sm-9">
              <input name="alamat" type="text" class="form-control" required>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Telepon</label>
            <div class="col-sm-9">
              <input name="telp" type="text" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Fax</label>
            <div class="col-sm-9">
              <input name="fax" type="text" class="form-control">
            </div>
          </div>
        </div>
        <div class="modal-footer bordered">
          <div class="col-sm-3">
            <small><p><sup><i class="fa fa-star" style="color: red"></i></sup>tidak boleh kosong</p></small>
          </div>
          <div class="col-sm-9">
            <button type="submit" class="btn btn-success btn-outline btn-round">Simpan</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- /modalTambah -->

@foreach($datas as $data)
<!-- modalUbah -->
<div id="modalUbah{{$data->id}}" class="modal bs-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="panel panel-info">
          <div class="panel-heading">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">Ubah Mitra</h4>
          </div>
        </div>
      <div class="modal-body">
        <form method="POST" class="form-horizontal" role="form">
          <input type="hidden" name="id" value="{{ $data->id }}">
          {{ method_field('PUT') }} 
          {{ csrf_field() }}                                    
          <div class="form-group">
            <label class="col-sm-2 control-label">Nama Mitra<small><sup><i class="fa fa-star" style="color: red"></i></sup></small></label>
            <div class="col-sm-9">
              <input name="nama_mitra" type="text" class="form-control" value="{{ $data->nama_mitra }}" required>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Alamat<small><sup><i class="fa fa-star" style="color: red"></i></sup></small></label>
            <div class="col-sm-9">
              <input name="alamat" type="text" class="form-control" value="{{ $data->alamat }}" required>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Telepon</label>
            <div class="col-sm-9">
              <input name="telp" type="text" class="form-control" value="{{ $data->telp }}">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Fax</label>
            <div class="col-sm-9">
              <input name="fax" type="text" class="form-control" value="{{ $data->fax }}">
            </div>
          </div>
        </div>
        <div class="modal-footer bordered">
          <div class="col-sm-3">
            <small><p><sup><i class="fa fa-star" style="color: red"></i></sup>tidak boleh kosong</p></small>
          </div>
          <div class="col-sm-9">
            <button type="submit" class="btn btn-info btn-outline btn-round">Simpan</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- /modalUbah -->

<!-- modalHapus -->
<div id="modalHapus{{$data->id}}" class="modal bs-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="panel panel-danger">
          <div class="panel-heading">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">Hapus Mitra</h4>
          </div>
        </div>
      <div class="modal-body">
        <form method="POST" class="form-horizontal" role="form">
          <input type="hidden" name="id" value="{{ $data->id }}">
          {{ method_field('DELETE') }} 
          {{ csrf_field() }}       
          <center>Data Mitra <strong>{{ $data->nama_mitra }}</strong> Akan Dihapus, Apakah Anda Yakin?</center>
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
@endpush