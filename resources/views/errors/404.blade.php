@extends('layouts.main')

@section('title', 'Page Not Found')

@section('main')
	<div class="wrapper">
		<div class="page-not-found">
			<img src="{{ asset('resources/assets/img/404-page.jpg') }}" alt="page-not-found">		
		</div>
	</div>
@endsection