@extends('layouts.main')

@section('title', 'Edit Profile')

@section('main')
	<div class="wrapper">
		<div id="messages">
			@include('partials.messages')
			@include('partials.errors')
		</div>
		<section class="profile-section">
		
		    <div id="profile-menu">
				@include('partials.profile-menu')
			</div>


		    <div class="edit-profile">
			   	<form action="{{ route('user.update') }}" method="POST">
			   	  @method('PATCH')
			   	  @csrf

				  <div class="edit-form-group">
				  	<label for="full_name">Full Name</label>
				    <input class="edit-form-control" type="text" id="full_name" name="full_name" value="{{ $user->full_name }}">
				  </div>

				  <div class="edit-form-group">
				  	<label for="email">Email</label>
				    <input class="edit-form-control" type="email" id="email" name="email" value="{{ $user->email }}">
				  </div>

				  <div class="edit-form-group">
				  	<label for="username">Username</label>
				    <input class="edit-form-control" type="text" id="username" name="username" value="{{ $user->username }}">
				  </div>

				  <div class="edit-form-group">
				  	<label for="password">Password</label>
				    <input class="edit-form-control" type="password" id="password" name="password">
				  </div>

				  <div class="edit-form-group">
				  	<label for="confirm_password">Confirm Password</label>
				    <input class="form-control" type="password" id="confirm_password" name="confirm_password">
				  </div>

				  <div class="edit-form-group">
				  	<button class="site-btn" type="submit">
				  		Update
				  	</button>
				  </div>
				  
				</form>
			</div>	
		</section>
	</div>  
@endsection