@extends('layouts.blank')

@section('title')

<i class="fa fa-comment"></i> Daftar Pesan Masuk

@endsection

@push('stylesheets')
<!-- page level plugin styles -->
<link rel="stylesheet" href="{{ asset('DataTables/datatables.css') }}">
<!-- /page level plugin styles -->
@endpush

@section('main_container')

<!-- main area -->
<div class="main-content">
  @if(session()->get('message')=="bUbah")
  <!-- Success Alert -->
  <div class="alert alert-info alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    Yay! Status berhasil di<strong>ubah</strong>.
  </div>
  <!-- /Success Alert -->
  {{session()->forget('message')}}
  @endif
  @if(session()->get('message')=="bHapus")
  <!-- Success Alert -->
  <div class="alert alert-danger alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    Yay! Pesan berhasil di<strong>hapus</strong>.
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
        <li class="active">Pesan Masuk</li>
      </ol>
    </div>
    <div class="panel-body">
      <table id="datatable" class="table table-striped datatable responsive align-middle bordered">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Isi Pesan</th>
            <th>Dikirim Pada</th>
            <th>Status</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach($datas as $no => $data)
          <tr>
            <td>{{ $no+1 }}</td>
            <td>{{ $data->nama }}</td>
            <td>{{ $data->isi_pesan }}</td>
            <td>{{ $data->created_at }}</td>
            <td>
              @if($data->status==1)
                <span class="label label-warning">Belum Ditanggapi</span>
              @else
                <span class="label label-default">Sudah Ditanggapi</span>
              @endif
            </td>
            <td class="text-center">
              <button data-target="#modalUbah{{$data->id}}" class="btn btn-info btn-outline btn-xs" data-toggle="modal"><i class="fa fa-pencil"></i> Status</button>
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
<!-- modalUbah -->
<div id="modalUbah{{$data->id}}" class="modal bs-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="panel panel-info">
          <div class="panel-heading">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">Ubah Status Pesan</h4>
          </div>
        </div>
      <div class="modal-body">
        <form method="POST" class="form-horizontal" role="form">
          <input type="hidden" name="id" value="{{ $data->id }}">
          {{ method_field('PUT') }} 
          {{ csrf_field() }}                                    
          <center>
          Status Pesan : 
            <div class="btn-group" data-toggle="buttons">
              @if($data->status==1)
              <label class="btn btn-default no-margin active">
                <input name="status" type="radio" name="options" id="option1" value="1">
                <i class="fa fa-close mr5"></i>Belum Ditanggapi
              </label>
              <label class="btn btn-default">
                <input name="status" type="radio" name="options" id="option2" value="0">
                <i class="fa fa-check mr5"></i>Sudah Ditanggapi
              </label>
              @else
              <label class="btn btn-default">
                <input name="status" type="radio" name="options" id="option1" value="1">
                <i class="fa fa-close mr5"></i>Belum Ditanggapi
              </label>
              <label class="btn btn-default no-margin active">
                <input name="status" type="radio" name="options" id="option2" value="0">
                <i class="fa fa-check mr5"></i>Sudah Ditanggapi
              </label>
              @endif
            </div>
          </center>
        </div>
        <div class="modal-footer bordered">
          <button type="submit" class="btn btn-info btn-outline btn-round">Simpan</button>
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
            <h4 class="modal-title">Hapus Pesan</h4>
          </div>
        </div>
      <div class="modal-body">
        <form method="POST" class="form-horizontal" role="form">
          <input type="hidden" name="id" value="{{ $data->id }}">
          {{ method_field('DELETE') }} 
          {{ csrf_field() }}       
          <center>Satu Pesan dari <strong>{{ $data->nama }}</strong> Akan Dihapus, Apakah Anda Yakin?</center>
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