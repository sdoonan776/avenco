<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	    <meta name="description" content="Avenco ">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>{{ config('app.name') }} - @yield('title')</title>
		<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
	</head>
	<body>
		<header>
		  @include('partials.header')
		  @include('partials.header-info')			
		</header>

		<main>
		  @if(session('message'))
		  	<div class="notification is-info">{{ session('message') }}</div>
		  @endif	
		  	@yield('main')
		  	<div id="app"></div>
		</main>

		<footer>
	      @include('partials.footer')
		</footer>
		
		<script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
	</body>
</html>