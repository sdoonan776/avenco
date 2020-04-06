@extends('layouts.user-form')

@section('title', 'Enter Email')

@section('form')
	  <div class="wrapper">
	  	<div class="auth-form">
		    <form id="email" method="POST" action="{{ route('password.email') }}">
		      @csrf

		      <h3>
		        Send Link
		      </h3>

		      <div id="messages">
	            @include('partials.messages')
	            @include('partials.errors')
	          </div>

		      <div class="mb-4">
		        <input class="auth-form-input" id="email" type="email" name="email" placeholder="Email" value="{{ old('email') ?? '' }}">
		      </div>

		      <div class="mb-4">
		        <button class="site-btn w-full" type="submit">
		          Reset Password
		        </button>
		      </div>
		    </form>
	     </div>
	  </div>
@endsection