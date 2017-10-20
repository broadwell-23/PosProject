@extends('layouts.blank')

@section('title')

<i class="fa fa-bar-chart"></i> Dashboard

@endsection

@push('stylesheets')
<!-- page level plugin styles -->
<link rel="stylesheet" href="styles/climacons-font.css">
<link rel="stylesheet" href="vendor/rickshaw/rickshaw.min.css">
<!-- /page level plugin styles -->
@endpush

@section('main_container')

<!-- main area -->
<div class="main-content">
<div class="row">
  <div class="col-md-4">
    <div>
      <div class="widget bg-white">
        <div class="widget-icon bg-blue pull-left fa fa-user">
        </div>
        <div class="overflow-hidden">
          <span class="widget-title">{{ $user }}</span>
          <span class="widget-subtitle">Jumlah Admin</span>
        </div>
      </div>
      <div class="widget bg-white">
        <div class="widget-icon bg-success pull-left fa fa-briefcase">
        </div>
        <div class="overflow-hidden">
          <span class="widget-title">{{ $barang }}</span>
          <span class="widget-subtitle">Jumlah Barang</span>
        </div>
      </div>
      <div class="widget bg-white">
        <div class="widget-icon bg-info pull-left fa fa-archive">
        </div>
        <div class="overflow-hidden">
          <span class="widget-title">{{ $packing }}</span>
          <span class="widget-subtitle">Jumlah <i>Packing</i></span>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div>
      <section class="widget bg-lightblue">
        <div class="widget-details">
          <center>
            <small class="block">Welcome, </small>
            <span class="h5 bold">{{ Auth::user()->name }}</span>
          </center>
        </div>
      </section>
      <div class="widget bg-white">
        <div class="widget-icon bg-warning pull-left fa fa-file">
        </div>
        <div class="overflow-hidden">
          <span class="widget-title">{{ $dokumen }}</span>
          <span class="widget-subtitle">Jumlah Dokumen Pendukung</span>
        </div>
      </div>
      <div class="widget bg-white">
        <div class="widget-icon bg-purple pull-left fa fa-list-alt">
        </div>
        <div class="overflow-hidden">
          <span class="widget-title">{{ $aturan }}</span>
          <span class="widget-subtitle">Jumlah Aturan</span>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div>
      <div class="widget bg-white">
        <div class="widget-icon bg-success pull-left fa fa-tags">
        </div>
        <div class="overflow-hidden">
          <span class="widget-title">{{ $tag }}</span>
          <span class="widget-subtitle">Jumlah <i>Tags</i></span>
        </div>
      </div>
      <div class="widget bg-white">
        <div class="widget-icon bg-blue pull-left fa fa-bank">
        </div>
        <div class="overflow-hidden">
          <span class="widget-title">{{ $mitra }}</span>
          <span class="widget-subtitle">Jumlah Mitra</span>
        </div>
      </div>
      <div class="widget bg-white">
        <div class="widget-icon bg-danger pull-left fa fa-comment">
        </div>
        <div class="overflow-hidden">
          <span class="widget-title">{{ $pesan }}</span>
          <span class="widget-subtitle">Jumlah Pesan Masuk</span>
        </div>
      </div>
    </div>
  </div>
</div>

</div>
<!-- /main area -->

@endsection

@push('scripts')
<!-- page level scripts -->
<script src="vendor/d3/d3.min.js"></script>
<script src="vendor/rickshaw/rickshaw.min.js"></script>
<script src="vendor/flot/jquery.flot.js"></script>
<script src="vendor/flot/jquery.flot.resize.js"></script>
<script src="vendor/flot/jquery.flot.categories.js"></script>
<script src="vendor/flot/jquery.flot.pie.js"></script>
<!-- /page level scripts -->

<!-- initialize page scripts -->
<script src="scripts/pages/dashboard.js"></script>
<!-- /initialize page scripts -->
@endpush