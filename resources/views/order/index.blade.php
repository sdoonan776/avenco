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
	    	<ul class="">
	    	@foreach($orders as $order)	
			  <li class="">
			  	{{ $order->name }}
			  </li>
			  <li class="">
			  	{{ $order->price }}
			  </li>
			  {{-- <li class="">
			  	{{ $order->pivot->quantity }}
			  </li> --}}
			@endforeach  
			</ul>
    	</div>
	</div>
@endsection