@extends('layouts.user-form')

@section('title', 'Reset Password')

@section('form')
	  <div class="wrapper">
	  	<div class="auth-form">
		    <form id="reset" method="POST" action="{{ route('password.reset') }}">
	        @csrf

		      <h3>
		        Reset Password
		      </h3>

		      <div id="messages">
	            @include('partials.messages')
	            @include('partials.errors')
	          </div>  

		       <input type="hidden" name="token" value="{{ $token }}">

		       <div class="mb-4">
	            	<input class="auth-form-input" id="email" type="email" name="email" value="{{ old('email') ?? '' }}" placeholder="Email" required>
	        	</div>

	        	<div class="mb-4">
		            <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
	        	</div>

	        	<div class="wrap-input100 validate-input m-b-16">
		            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
		        	<span class="focus-input100"></span>
	        	</div>

		      <div class="my-6">
		        <button class="site-btn w-full" type="submit">
		          Reset Password
		        </button>
		      </div>
		    </form>
		 </div>   
	  </div>
@endsection