<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	    <meta name="description" content="Avenco">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>{{ config('app.name') }} | @yield('title')</title>
		<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
		<link rel="favicon" href="{{ asset('favicon.ico') }}">
	</head>
	<body>
		
		<main>
			@yield('form')
		</main>
		
		<script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
	</body>
</html>