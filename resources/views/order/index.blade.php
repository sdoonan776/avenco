@extends('layouts.main')

@section('title', 'Orders')

@section('main')
	<div class="container d-flex flex-lg-row p-5">
	    <div class="profile-menu col-lg-4">
	    	<nav class="nav flex-column">
    	    	<a class="nav-link" href="{{ route('orders.index') }}">Orders</a>
	    	    <a class="nav-link" href="{{ route('profile.edit') }}">Profile</a>
	    	</nav>
	    </div>
	    <div class="orders">
	    	<ul class="list-group">
	    	{{-- @foreach()	 --}}
			  <li class="list-group-item"></li>
			{{-- @endforeach   --}}
			</ul>
    	</div>
	</div>
@endsection