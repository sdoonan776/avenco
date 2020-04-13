@extends('layouts.main')

@section('title', 'Orders')

@section('main')
	<div class="wrapper">
    	<div id="profile-menu">
			@include('partials.profile-menu')
		</div>

		<div id="messages">
			@include('partials.messages')
			@include('partials.errors')
		</div>

    	<div class="orders">
	    	@foreach($orders as $order)	
    		<ul class="order">
			  <li class="order-item">
			  	{{-- {{ $order->products()->name }} --}}
			  </li>
			  <li class="order-item">
{{-- 			  	{{ $order->price }} --}}
			  </li>
			  <li>
			  </li>
			  {{-- <li class="">
			  	{{ $order->pivot->quantity }}
			  </li> --}}
			</ul>
			@endforeach  
		</div>
	</div>
@endsection