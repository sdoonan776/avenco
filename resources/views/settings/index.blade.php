@extends('layouts.main')

@section('title', 'Settings')

@section('main')
  <div class="card-body">
    <h4 class="card-title">Settings</h4>
   	<form action="{{ route('settings.update', $user) }}" method="POST">
   	  @method('PUT')
   	  @csrf
	  <div class="form-group">
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
	  	<input class="btn btn-primary" type="submit" value="Update">
	  </div>
	</form>
  </div>
@endsection