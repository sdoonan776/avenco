@extends('layouts.user-form')

@section('title', 'Enter Email')

@section('form')
  <div class="limiter">
	<div class="container-login100">
	  <div class="wrap-login100 p-t-50 p-b-90">
	    <form class="login100-form validate-form flex-sb flex-w" method="POST" action="{{ route('password.email') }}">
	      @csrf

	      <span class="login100-form-title p-b-51">
	        Send Link
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

	      <div class="wrap-input100 validate-input m-b-16">
	        <input class="input100" type="text" name="email" placeholder="Email" value="{{ old('email') ?? '' }}">
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