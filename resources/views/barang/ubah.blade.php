@extends('layouts.blank')

@section('title')

<i class="fa fa-briefcase"></i> Ubah Barang</i>

@endsection

@push('stylesheets')
<!-- page level plugin styles -->
<link rel="stylesheet" href="{{ asset('vendor/chosen_v1.4.0/chosen.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/jquery.tagsinput/jquery.tagsinput.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/checkbo/src/0.1.4/css/checkBo.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/intl-tel-input/build/css/intlTelInput.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/dropzone/dist/min/basic.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/dropzone/dist/min/dropzone.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/bootstrap-daterangepicker/daterangepicker-bs3.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/bootstrap-datepicker/dist/css/bootstrap-datepicker3.cs') }}">
<link rel="stylesheet" href="{{ asset('vendor/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/clockpicker/dist/bootstrap-clockpicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css') }}">
<!-- /page level plugin styles -->
@endpush

@section('main_container')

<!-- main area -->
<div class="main-content">
  <div class="panel">
    <div class="panel-heading border">
      <ol class="breadcrumb mb0 no-padding">
        <li>
          <a href="{{ route('dashboard') }}">Admin Panel</a>
        </li>
        <li>
          <a href="#">Informasi Barang</a>
        </li>
        <li>
          <a href="{{ route('barang') }}">Daftar Barang</a>
        </li>
        <li class="active">Ubah Barang</li>
      </ol>
    </div>
    <div class="panel-body">
      <div class="row no-margin">
        <div class="col-lg-12">
          <form method="POST" class="form-horizontal bordered-group" role="form">
            {{ method_field('PUT') }} 
            {{ csrf_field() }}                       
            <div class="form-group">
              <label class="col-sm-2 control-label">Nama Barang<small><sup><i class="fa fa-star" style="color: red"></i></sup></small></label>
              <div class="col-sm-10">
                <input name="nama_barang" type="text" class="form-control" value="{{ $data->nama_barang }}" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label"><i>Packing</i></label>
              <div class="col-xs-9 mb25">
                <select name="packing_id[]" data-placeholder="Pilih Cara Packing" multiple class="chosen" style="width: 100%;">
                  <option value=""></option>
                  @foreach($packings as $data)
                    <option value="{{ $data->id }}"
                      @foreach($selected_packings as $selected) 
                        @if($data->id==$selected->id)
                          selected
                        @endif
                      @endforeach
                    >{{ $data->nama_packing }}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-sm-1">
                <a href="{{ route('packing') }}" class="btn btn-success btn-icon-icon btn mr5 pull-right">
                  <i class="fa fa-plus"></i>
                </a>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Dokumen Pendukung</label>
              <div class="col-xs-9 mb25">
                <select name="dokumen_id[]" data-placeholder="Pilih Dokumen Pendukung" multiple class="chosen" style="width: 100%;">
                  <option value=""></option>
                  @foreach($dokumens as $data)
                    <option value="{{ $data->id }}"
                      @foreach($selected_dokumens as $selected) 
                        @if($data->id==$selected->id)
                          selected
                        @endif
                      @endforeach
                    >{{ $data->nama_dokumen }}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-sm-1">
                <a href="{{ route('dokumen') }}" class="btn btn-success btn-icon-icon btn mr5 pull-right">
                  <i class="fa fa-plus"></i>
                </a>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Aturan</label>
              <div class="col-xs-9 mb25">
                <select name="aturan_id[]" data-placeholder="Pilih Aturan" multiple class="chosen" style="width: 100%;">
                  <option value=""></option>
                  @foreach($aturans as $data)
                    <option value="{{ $data->id }}"
                      @foreach($selected_aturans as $selected) 
                        @if($data->id==$selected->id)
                          selected
                        @endif
                      @endforeach
                    >{{ $data->isi_aturan }}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-sm-1">
                <a href="{{ route('aturan') }}" class="btn btn-success btn-icon-icon btn mr5 pull-right">
                  <i class="fa fa-plus"></i>
                </a>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Moda Transportasi</label>
              <div class="col-xs-9 mb25">
                <select name="transportasi_id[]" data-placeholder="Pilih Transportasi" multiple class="chosen" style="width: 100%;">
                  <option value=""></option>
                  @foreach($transportasis as $data)
                    <option value="{{ $data->id }}"
                      @foreach($selected_transportasis as $selected) 
                        @if($data->id==$selected->id)
                          selected
                        @endif
                      @endforeach
                    >{{ $data->moda_transportasi }}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-sm-1">
                <a href="{{ route('transportasi') }}" class="btn btn-success btn-icon-icon btn mr5 pull-right">
                  <i class="fa fa-plus"></i>
                </a>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Tujuan</label>
              <div class="col-xs-9 mb25">
                <select name="tujuan" data-placeholder="Pilih Tujuan" class="chosen" style="width: 100%;">
                  <option value=""></option>
                  @if($tujuan==2)
                  <option value="1">Dalam Negeri</option>
                  <option value="2" selected>Luar Negeri</option>
                  @else
                  <option value="1" selected>Dalam Negeri</option>
                  <option value="2">Luar Negeri</option>
                  @endif
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label"><i>Tags</i></label>
              <div class="col-xs-9 mb25">
                <select name="tag_id[]" data-placeholder="Pilih Tag" multiple class="chosen" style="width: 100%;">
                  <option value=""></option>
                  @foreach($tags as $data)
                    <option value="{{ $data->id }}"
                      @foreach($selected_tags as $selected) 
                        @if($data->id==$selected->id)
                          selected
                        @endif
                      @endforeach
                    >{{ $data->nama_tag }}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-sm-1">
                <a href="{{ route('tag') }}" class="btn btn-success btn-icon-icon btn mr5 pull-right">
                  <i class="fa fa-plus"></i>
                </a>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Keterangan</label>
              <div class="col-sm-10">
                <input name="keterangan" type="text" class="form-control" value="{{ $keterangan }}">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-2">
                <small><p><sup><i class="fa fa-star" style="color: red"></i></sup>tidak boleh kosong</p></small>
              </div>
              <div class="col-sm-10">
                <button type="submit" class="btn btn-info btn-outline btn-round" style="float: right">Simpan</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /main area -->

@endsection

@push('scripts')
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