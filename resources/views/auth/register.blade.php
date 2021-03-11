@extends('layouts.auth')

@section('title', 'Register')

@section('form')
    <div class="wrapper">
      <div class="auth-form">
        <form id="register" method="POST" action="{{ route('register') }}">
          @csrf
          
          <h3>Register</h3>

          <div id="messages">
            @include('partials.messages')
            @include('partials.errors')
          </div>  

          <div class="mb-4">
            <input class="auth-form-input" type="text" name="full_name" placeholder="Full Name" value="{{ old('full_name') ?? '' }}" required>
          </div>

          <div class="mb-4">
            <input class="auth-form-input" type="email" name="email" placeholder="Email" value="{{ old('email') ?? '' }}" required>
          </div>

          <div class="mb-4">
            <input class="auth-form-input" type="text" name="username" placeholder="Username" value="{{ old('username') ?? '' }}" required>
          </div>
          
          <div class="mb-4">
            <input class="auth-form-input" type="password" name="password" placeholder="Password" required>
          </div>

          <div class="mb-4">
            <input class="auth-form-input" type="password" name="confirm_password" placeholder="Confirm Password" required>
          </div>

          <div class="mb-6">
            <button class="site-btn w-full" type="submit">
              Register
            </button>
          </div>
          
        </form>
      </div>
    </div>
@endsection