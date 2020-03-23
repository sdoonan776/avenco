@extends('layouts.user-form')

@section('title', 'Reset Password')

@section('form')
  <div class="limiter">
	<div class="container-login100">
	  <div class="wrap-login100 p-t-50 p-b-90">
	    <form class="login100-form validate-form flex-sb flex-w" method="POST" action="{{ route('password.reset') }}">
	      @csrf

	      <span class="login100-form-title p-b-51">
	        Reset Password
	      </span>

	      @if(count($errors) > 0)
	        <div class="alert alert-danger" role="alert">
	            <ul>
	                @foreach ($errors->all() as $error)
	                    <li>{{ $error }}</li>
	                @endforeach
	            </ul>
	        </div>
	      @endif

	       <input type="hidden" name="token" value="{{ $token }}">

	       <div class="wrap-input100 validate-input m-b-16">
            	<input id="email" type="email" class="form-control" name="email" value="{{ old('email') ?? '' }}" placeholder="Email" required autofocus>
            	<span class="focus-input100"></span>
        	</div>

        	<div class="wrap-input100 validate-input m-b-16">
	            <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
	            <span class="focus-input100"></span>
        	</div>

        	<div class="wrap-input100 validate-input m-b-16">
	            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
	        	<span class="focus-input100"></span>
        	</div>

	      <div class="container-login100-form-btn m-t-17">
	        <button class="login100-form-btn">
	          Reset Password
	        </button>
	      </div>

	    </form>
	  </div>
	</div>
  </div>
@endsection