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
        <div class="widget-icon bg-blue pull-left fa fa-microphone">
        </div>
        <div class="overflow-hidden">
          <span class="widget-title">8,372K</span>
          <span class="widget-subtitle">Registered users</span>
        </div>
      </div>
      <div class="widget bg-white">
        <div class="widget-icon bg-danger pull-left fa fa-tint">
        </div>
        <div class="overflow-hidden">
          <span class="widget-title percent">86</span>
          <span class="widget-subtitle">Revenue increase</span>
        </div>
      </div>
      <div class="widget bg-white">
        <div class="widget-icon bg-success pull-left fa fa-paper-plane">
        </div>
        <div class="overflow-hidden">
          <span class="widget-title">7,355K</span>
          <span class="widget-subtitle">Pending orders</span>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div>
      <section class="widget bg-lightblue">
        <div class="widget-details">
          <a href="javascript:;" class="pull-left relative">
            <img src="images/avatar.jpg" class="avatar avatar-sm img-circle bordered" alt="">
          </a>
        </div>
        <div class="widget-details">
          <small class="block">Welcome, </small>
          <span class="h5 bold">{{ Auth::user()->name }}</span>
        </div>
      </section>
      <div class="widget bg-white">
        <div class="widget-icon bg-danger pull-left fa fa-tint">
        </div>
        <div class="overflow-hidden">
          <span class="widget-title percent">86</span>
          <span class="widget-subtitle">Revenue increase</span>
        </div>
      </div>
      <div class="widget bg-white">
        <div class="widget-icon bg-success pull-left fa fa-paper-plane">
        </div>
        <div class="overflow-hidden">
          <span class="widget-title">7,355K</span>
          <span class="widget-subtitle">Pending orders</span>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div>
      <div class="widget bg-white">
        <div class="widget-icon bg-blue pull-left fa fa-microphone">
        </div>
        <div class="overflow-hidden">
          <span class="widget-title">8,372K</span>
          <span class="widget-subtitle">Registered users</span>
        </div>
      </div>
      <div class="widget bg-white">
        <div class="widget-icon bg-danger pull-left fa fa-tint">
        </div>
        <div class="overflow-hidden">
          <span class="widget-title percent">86</span>
          <span class="widget-subtitle">Revenue increase</span>
        </div>
      </div>
      <div class="widget bg-white">
        <div class="widget-icon bg-success pull-left fa fa-paper-plane">
        </div>
        <div class="overflow-hidden">
          <span class="widget-title">7,355K</span>
          <span class="widget-subtitle">Pending orders</span>
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