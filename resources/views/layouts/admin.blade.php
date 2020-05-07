<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	    <meta name="description" content="Avenco ">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>Admin | @yield('title')</title>
		<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/tailwind.css') }}">
		<link rel="favicon" href="{{ asset('favicon.ico') }}">
	</head>
	<body class="bg-gray-900 font-sans leading-normal tracking-normal mt-6 flex flex-col md:flex-row">

		<header class="admin-header">
		  	@include('admin.partials.header')
		</header>

		<nav class="sidebar">
			@include('admin.partials.sidebar')
		</nav> 

		<main class="main-content flex-1 bg-gray-100 md:pt-8 md:px-24 mt-12 md:mt-18 pb-24 md:pb-5">
		  	@yield('admin')
		</main>

		<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/fontawesome.js') }}"></script>
	</body>
</html>