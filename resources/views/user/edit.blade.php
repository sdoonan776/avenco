@extends('layouts.main')

@section('title', 'Edit Profile')

@section('main')
	<div class="container d-flex flex-lg-row p-5">
	    <div class="profile-menu col-lg-4">
	    	<nav class="nav flex-column">
    	    	<a class="nav-link" href="{{ route('order.index') }}">Orders</a>
	    	    <a class="nav-link" href="{{ route('user.index') }}">Profile</a>
    	    	<a class="nav-link" href="{{ route('user.edit') }}"> Edit Profile</a>
	    	</nav>
	    </div>
	    <div class="col-lg-4">
		   	<form action="{{ route('user.update') }}" method="POST">
		   	  @method('PATCH')
		   	  @csrf
			  <div class="profile-form form-group">
			  	<label for="full_name">Full Name</label>
			    <input class="form-control" type="text" id="full_name" name="full_name" value="{{ $user->full_name }}">
			  </div>
			  <div class="form-group">
			  	<label for="email">Email</label>
			    <input class="form-control" type="email" id="email" name="email" value="{{ $user->email }}">
			  </div>
			  <div class="form-group">
			  	<label for="username">Username</label>
			    <input class="form-control" type="text" id="username" name="username" value="{{ $user->username }}">
			  </div>
			  <div class="form-group">
			  	<label for="password">Password</label>
			    <input class="form-control" type="password" id="password" name="password">
			  </div>
			  <div class="form-group">
			  	<label for="confirm_password">Confirm Password</label>
			    <input class="form-control" type="password" id="confirm_password" name="confirm_password">
			  </div>
			  <div class="form-group">
			  	<input class="btn btn-secondary" type="submit" value="Update">
			  </div>
			</form>
		</div>	
	</div>  
@endsection