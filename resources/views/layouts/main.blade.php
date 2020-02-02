<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	    <meta name="description" content="Demo project">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>{{ config('app.name') }} - @yield('title')</title>
		<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
	</head>
	<body>
		<header>
		  @include('partials.header')			
		</header>
		
		<nav>
	      @include('partials.sidebar')
		</nav>

		<main>
		  @yield('main')
		</main>

		<footer>
	      @include('partials.footer')
		</footer>
		
		<script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
	</body>
</html>