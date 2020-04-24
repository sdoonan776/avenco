@extends('layouts.user-form')

@section('title', 'Admin Login')

@section('admin')
	  <div class="wrapper">
      <div class="auth-form">
        <form id="login" method="POST" action="{{ route('login') }}">
        @csrf

          <h3> 
          	Admin Login
          </h3>

          {{-- <div id="messages">
            @include('partials.messages')
            @include('partials.errors')
          </div> --}}

          <div class="mb-4">
            <input class="auth-form-input" name="username" type="text" placeholder="Username" value="{{ old('username') ?? '' }}">
          </div>

          <div class="mb-6">
            <input class="auth-form-input" name="password" type="password" placeholder="Password">
          </div>

          <div class="my-6">
            <button class="site-btn w-full" type="submit">
              Login
            </button>
          </div>  
        </form>
    </div>
  </div>
@endsection
