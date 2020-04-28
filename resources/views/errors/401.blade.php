@extends('layouts.main')

@section('title', 'Page Not Found')

@section('main')
	<div class="wrapper">
		<div class="not-authorized">
			<img src="{{ asset('resources/assets/img/401-page.jpg') }}" alt="not-authorized">		
		</div>
	</div>
@endsection