@extends('template.layouts.default')

@section('title', 'Blank Page')
@push('css')
	<link href="{{base_url('assets/plugins/datatables/css/dataTables.bootstrap4.css')}}" rel="stylesheet" />
	<link href="{{base_url('assets/plugins/datatables/css/fixedcolumns/fixedcolumns.bootstrap4.min.css')}}" rel="stylesheet" />
	<link href="{{base_url('assets/plugins/datatables/css/responsive/responsive.bootstrap4.css')}}" rel="stylesheet" />
@endpush
@section('content')
	<!-- begin breadcrumb -->
	<ol class="breadcrumb pull-right">
		<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
		<li class="breadcrumb-item"><a href="javascript:;">Master</a></li>
		<li class="breadcrumb-item active">Penjualan</li>
	</ol>
	<!-- end breadcrumb -->
	<!-- begin page-header -->
	<h1 class="page-header">Penjualan <small></small></h1>
	<!-- end page-header -->
	
	<!-- begin panel -->
	<div class="panel panel-inverse">
		<div class="panel-heading">
			<div class="panel-heading-btn">
				<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
				<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
				<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
				<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
			</div>
			<h4 class="panel-title">Transaksi</h4>
		</div>
		<div class="panel-body">
			
		</div>
	</div>
	<!-- end panel -->
@endsection

@push('scripts')
	<script src="{{base_url('assets/plugins/datatables/js/jquery.dataTables.js')}}"></script>
	<script src="{{base_url('assets/plugins/datatables/js/dataTables.bootstrap4.js')}}"></script>
	<script src="{{base_url('assets/plugins/datatables/js/fixedcolumns/dataTables.fixedcolumns.js')}}"></script>
	<script src="{{base_url('assets/plugins/datatables/js/responsive/dataTables.responsive.js')}}"></script>
	<script src="{{base_url('assets/plugins/datatables/js/responsive/responsive.bootstrap4.js')}}"></script>
	<script src="{{base_url('assets/js/demo/table-manage-fixed-columns.demo.js')}}"></script>
	<script>
		$(document).ready(function() {

		});
	</script>
@endpush