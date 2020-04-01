@extends('layouts.main')

@section('title', 'Profile')

@section('main')
	<div class="container">
		<div class="profile-menu col-lg-4">
	    	<nav class="nav flex-column">
		    	<a class="nav-link" href="{{ route('order.index') }}">Orders</a>
	    	    <a class="nav-link" href="{{ route('user.edit') }}">Profile</a>
	    	    <a class="nav-link" href="{{ route('user.edit') }}"> Edit Profile</a>
	    	</nav>
	    </div>
	</div>
@endsection

