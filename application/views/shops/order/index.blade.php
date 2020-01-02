@extends('template.layouts.default')

@section('title', 'Courier Data')
@php
	$alert = false;
	if(ci()->session->flashdata('msg')){
		$alert = ci()->session->flashdata('msg');
	}
	function rpucStr(string $s){ return str_replace('_',' ',strtoupper($s)); }
@endphp
	
@section('content')
	<!-- begin breadcrumb -->
	<ol class="breadcrumb pull-right">
		<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
		<li class="breadcrumb-item"><a href="javascript:;">shops</a></li>
		<li class="breadcrumb-item active">Order</li>
	</ol>
	<!-- end breadcrumb -->
	
	<!-- begin page-header -->
	<h1 class="page-header">Order <small>header small text goes here...</small></h1>
	<!-- end page-header -->
	
	<!-- begin panel -->
	<div class="panel panel-primary">
		<div class="panel-heading">
			<div class="panel-heading-btn">
				<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
				<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
				<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
				<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
			</div>
			<h4 class="panel-title">List of Order</h4>
		</div>
		<div class="panel-body">
			<table id="data-table-combine" class="table table-striped table-bordered">
				<thead>
				  <tr>
					@foreach ($kolom as $i)
						<th scope="col">{{str_replace('_',' ',strtoupper($i))}}</th>
					@endforeach
					<th scope="col">Action</th>
				  </tr>
				</thead>
				<tbody>
					
				</tbody>
		</table>
		</div>
	</div>
	<!-- end panel -->

@endsection

@push('css')
	<link href="{{base_url('/assets/plugins/datatables/css/dataTables.bootstrap4.css')}}" rel="stylesheet" />
	<link href="{{base_url('/assets/plugins/datatables/css/autoFill/autoFill.bootstrap4.css')}}" rel="stylesheet" />
	<link href="{{base_url('/assets/plugins/datatables/css/colReorder/colReorder.bootstrap4.css')}}" rel="stylesheet" />
	<link href="{{base_url('/assets/plugins/datatables/css/keyTable/keyTable.bootstrap4.css')}}" rel="stylesheet" />
	<link href="{{base_url('/assets/plugins/datatables/css/rowReorder/rowReorder.bootstrap4.css')}}" rel="stylesheet" />
	<link href="{{base_url('/assets/plugins/datatables/css/responsive/responsive.bootstrap4.css')}}" rel="stylesheet" />
	<link href="{{base_url('/assets/plugins/datatables/css/select/select.bootstrap4.css')}}" rel="stylesheet" />
@endpush

@push('scripts')
	<script src="{{base_url('/assets/plugins/datatables/js/jquery.dataTables.js')}}"></script>
	<script src="{{base_url('/assets/plugins/datatables/js/dataTables.bootstrap4.js')}}"></script>
	<script src="{{base_url('/assets/plugins/datatables/js/autoFill/dataTables.autoFill.js')}}"></script>
	<script src="{{base_url('/assets/plugins/datatables/js/autoFill/autoFill.bootstrap4.js')}}"></script>
	<script src="{{base_url('/assets/plugins/datatables/js/keyTable/dataTables.keyTable.js')}}"></script>
	<script src="{{base_url('/assets/plugins/datatables/js/rowReorder/dataTables.rowReorder.js')}}"></script>
	<script src="{{base_url('/assets/plugins/datatables/js/colReorder/dataTables.colReorder.js')}}"></script>
	<script src="{{base_url('/assets/plugins/datatables/js/responsive/dataTables.responsive.js')}}"></script>
	<script src="{{base_url('/assets/plugins/datatables/js/responsive/responsive.bootstrap4.js')}}"></script>
	<script>
		const g = "{{route('order.grid')}}"
		$(document).ready(function() {
			$('#data-table-combine').DataTable({
				processing: true,
				serverSide: true,
				ajax: g,
				responsive: true,
				// autoFill: true,
				// colReorder: true,
				// keys: true,
				// rowReorder: true,
				select: true
			});

			$('.note-warning').fadeOut(6000)
		});
	</script>
@endpush