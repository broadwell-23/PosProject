@extends('layouts.blank')

@section('title')

Dashboard

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
          <a href="javascript:;">Home</a>
        </li>
        <li>
          <a href="javascript:;">Tables</a>
        </li>
        <li class="active">Data tables</li>
      </ol>
    </div>
    <div class="panel-body">
      <table class="table table-bordered bordered table-striped table-condensed datatable">
        <thead>
          <tr>
            <th>Name</th>
            <th>Position</th>
            <th>Office</th>
            <th>Age</th>
            <th>Start Date</th>
          </tr>
        </thead>
      </table>
    </div>
  </div>
</div>
<!-- /main area -->
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