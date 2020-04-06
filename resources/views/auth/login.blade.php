@extends('layouts.user-form')

@section('title', 'Login')

@section('form')
    <div class="wrapper">
      <div class="auth-form">
        <form id="login" method="POST" action="{{ route('login') }}">
        @csrf

          <h3> 
            Login to Continue
          </h3>

          <div id="messages">
            @include('partials.messages')
            @include('partials.errors')
          </div>

          <div class="mb-4">
            <input class="auth-form-input" name="email" type="email" placeholder="Email" value="{{ old('email') ?? '' }}">
          </div>

          <div class="mb-6">
            <input class="auth-form-input" name="password" type="password" placeholder="Password">
          </div>

          <div class="flex items-center justify-between">
            
            <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="{{ route('password.request') }}">
              Forgot Password?
            </a>

            <div class="form-group flex items-center">
              <input class="mr-1" id="remember-me" type="checkbox" name="remember-me">
              <label>
                Remember Me
              </label>
            </div>

          </div>

          <div class="my-6">
            <button class="site-btn w-full" type="submit">
              Login
            </button>
          </div>  

        </form>
        <div>
        <p>
          Don't have account?
          <a href="{{ route('register') }}">
            SIGN UP
          </a>
        </p>
      </div>
    </div>
  </div>
@endsection