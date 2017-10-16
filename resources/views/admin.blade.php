@extends('layouts.blank')

@section('title')

Daftar Admin

@endsection

@push('stylesheets')
<!-- page level plugin styles -->
<link rel="stylesheet" href="vendor/datatables/media/css/jquery.dataTables.css">
<!-- /page level plugin styles -->
@endpush

@section('main_container')
<!-- main area -->
<div class="main-content">
  <div class="panel">
    <div class="panel-heading border">
      <ol class="breadcrumb mb0 no-padding">
        <li>
          <a href="dashboard">Admin Panel</a>
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
      <table class="table table-striped datatable responsive">
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
          @foreach($datas as $no => $data)
          <tr>
            <td>{{ $no+1 }}</td>
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
<!-- modal -->
<div id="modalTambah" class="modal bs-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Tambah Admin</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form">
          <div class="form-group">
            <label class="col-sm-2 control-label">Nama</label>
            <div class="col-sm-9">
              <input type="text" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Email</label>
            <div class="col-sm-9">
              <input type="email" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Password</label>
            <div class="col-sm-9">
              <input type="password" class="form-control">
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer bordered">
        <button type="submit" class="btn btn-success btn-outline btn-round">Tambah</button>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<!-- page level scripts -->
<script src="vendor/datatables/media/js/jquery.dataTables.js"></script>
<!-- /page level scripts -->

<!-- initialize page scripts -->
<script src="scripts/extentions/bootstrap-datatables.js"></script>
<script src="scripts/pages/datatables.js"></script>
<!-- /initialize page scripts -->
@endpush