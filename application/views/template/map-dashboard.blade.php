@extends('template.layouts.default')

@section('title', 'MAP')

@section('content')
	{!! $map['html'] !!}
@endsection

@push('css')

@endpush

@push('scripts')
	{!! $map['js'] !!}
@endpush