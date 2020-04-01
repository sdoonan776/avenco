@extends('layouts.main')

@section('title', 'Orders')

@section('main')
	<div class="container d-flex flex-lg-row p-5">
	    <div class="profile-menu col-lg-4">
	    	<nav class="nav flex-column">
    	    	<a class="nav-link" href="{{ route('order.index') }}">Orders</a>
	    	    <a class="nav-link" href="{{ route('user.index') }}"> Profile</a>
	    	    <a class="nav-link" href="{{ route('user.edit') }}">  Edit Profile</a>
	    	</nav>
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