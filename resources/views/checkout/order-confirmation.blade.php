@extends('layouts.main')

@section('title', 'Thank You')

@section('main')

	<div class="order-placed">
		<img src="{{ asset('resources/assets/img/tick.svg') }}" alt="tick">		
		<span>Your order has been successfully placed</span>
	</div>

@endsection