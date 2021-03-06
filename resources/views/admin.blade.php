@extends('layouts.blank')

@section('title')

<i class="fa fa-user"></i> Daftar Admin

@endsection

@push('stylesheets')
<!-- page level plugin styles -->
<link rel="stylesheet" href="{{ asset('DataTables/datatables.css') }}">
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
          <a href="{{ route('dashboard') }}">Admin Panel</a>
        </li>
        <li class="active">Admin</li>
      </ol>
    </div>
    <div class="panel-heading">
      <button data-target="#modalTambah" class="btn btn-success btn-round btn-icon" style="float: right" data-toggle="modal">
        <i class="fa fa-plus"></i>
        <span>Tambah Data</span>
      </button>
    </div>
    <div class="panel-body">
      <table id="datatable" class="table table-striped datatable responsive align-middle bordered">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Dibuat Pada</th>
            <th>Diupdate Pada</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach($datas as $data)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $data->name }}</td>
            <td>{{ $data->email }}</td>
            <td>{{ $data->created_at }}</td>
            <td>{{ $data->updated_at }}</td>
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
            <h4 class="modal-title">Tambah Admin</h4>
          </div>
        </div>
      <div class="modal-body">
        <form method="POST" class="form-horizontal" role="form">
          {{csrf_field()}}
          <div class="form-group">
            <label class="col-sm-2 control-label">Nama<small><sup><i class="fa fa-star" style="color: red"></i></sup></small></label>
            <div class="col-sm-9">
              <input name="name" type="text" class="form-control" required>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Email<small><sup><i class="fa fa-star" style="color: red"></i></sup></small></label>
            <div class="col-sm-9">
              <input name="email" type="email" class="form-control" required>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Password<small><sup><i class="fa fa-star" style="color: red"></i></sup></small></label>
            <div class="col-sm-9">
              <input name="password" type="password" class="form-control" placeholder="(minimal 8 karakter)" required="" minlength="8">
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
            <h4 class="modal-title">Ubah Admin</h4>
          </div>
        </div>
      <div class="modal-body">
        <form method="POST" class="form-horizontal" role="form">
          <input type="hidden" name="id" value="{{ $data->id }}">
          {{ method_field('PUT') }} 
          {{ csrf_field() }}                                    
          <div class="form-group">
            <label class="col-sm-2 control-label">Nama<small><sup><i class="fa fa-star" style="color: red"></i></sup></small></label>
            <div class="col-sm-9">
              <input name="name" type="text" class="form-control" value="{{ $data->name }}" required>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Email<small><sup><i class="fa fa-star" style="color: red"></i></sup></small></label>
            <div class="col-sm-9">
              <input name="email" type="email" class="form-control" value="{{ $data->email }}" required>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Password</label>
            <div class="col-sm-9">
              <input name="password" type="password" class="form-control" placeholder="(jika dikosongkan, password tidak berubah | minimal 8 karakter)">
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
            <h4 class="modal-title">Hapus Admin</h4>
          </div>
        </div>
      <div class="modal-body">
        <form method="POST" class="form-horizontal" role="form">
          <input type="hidden" name="id" value="{{ $data->id }}">
          {{ method_field('DELETE') }} 
          {{ csrf_field() }}       
          <center>Data <strong>{{ $data->email }}</strong> Akan Dihapus, Apakah Anda Yakin?</center>
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
<!-- DataTables -->
<script src="{{ asset('DataTables/datatables.js') }}"></script>
<script>
    $(document).ready( function () {
        $('#datatable').DataTable( {
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
@endpush