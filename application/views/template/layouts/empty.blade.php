<!DOCTYPE html>
<html lang="{{ "en" }}">
<head>
	@include('template.includes.head')
</head>
@php
	$bodyClass = (!empty($boxedLayout)) ? 'boxed-layout ' : '';
	$bodyClass .= (!empty($paceTop)) ? 'pace-top ' : '';
	$bodyClass .= (!empty($bodyExtraClass)) ? $bodyExtraClass . ' ' : '';
@endphp
<body class="{{ $bodyClass }}">
	@include('template.includes.component.page-loader')
	
	@yield('content')
			
	@include('template.includes.page-js')
</body>
</html>
