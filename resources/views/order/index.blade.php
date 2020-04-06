@extends('layouts.main')

@section('title', 'Orders')

@section('main')
	<div class="wrapper">
    	<div id="profile">
			@include('partials.profile-menu')
		</div>

		<div id="messages">
			@include('partials.messages')
			@include('partials.errors')
		</div>
    
	    <div class="orders">
	    	<ul class="list-group">
	    	@foreach($orders as $order)	
			  <li class="list-group-item">
			  	{{ $order }}
			  </li>
			@endforeach  
			</ul>
    	</div>
	</div>
@endsection