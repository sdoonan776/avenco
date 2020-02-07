@extends('layouts.user-form')

@section('title', 'Register')

@section('form')
  <div class="limiter">
    <div class="container-register100">
      <div class="wrap-register100 p-t-50 p-b-90">
        @include('partials.errors')
        <form class="register100-form validate-form flex-sb flex-w" method="post" action="{{ route('api.register') }}">
          @csrf
          
          <span class="register100-form-title p-b-51">
            Register
          </span>

          <div class="wrap-input100 validate-input m-b-16">
            <input class="input100" type="text" name="full_name" placeholder="Full Name">
            <span class="focus-input100"></span>
            @error('full_name')
              <div class="alert alert-danger" role="alert">
                {{ $message }}
              </div>
          @enderror 
          </div>

          <div class="wrap-input100 validate-input m-b-16">
            <input class="input100" type="email" name="email" placeholder="Email">
            <span class="focus-input100"></span>
            @error('email')
              <div class="alert alert-danger" role="alert">
                {{ $message }}
              </div>
            @enderror 
          </div>

          <div class="wrap-input100 validate-input m-b-16">
            <input class="input100" type="text" name="username" placeholder="Username" autocomplete="off">
            <span class="focus-input100"></span>
            @error('username')
              <div class="alert alert-danger" role="alert">
                {{ $message }}        
              </div>
            @enderror 
          </div>
          
          <div class="wrap-input100 m-b-16">
            <input class="input100" type="password" name="password" placeholder="Password" autocomplete="off">
            <span class="focus-input100"></span>
            @error('password')
              <div class="alert alert-danger" role="alert">
                {{ $message }}        
              </div>
            @enderror 
          </div>

          <div class="wrap-input100 validate-input m-b-16">
            <input class="input100" type="password" name="password" placeholder="Confirm Password">
            <span class="focus-input100"></span>
          </div>

          <div class="container-register100-form-btn m-t-17">
            <button class="register100-form-btn">
              Register
            </button>
          </div>

        </form>
      </div>
    </div>
  </div>
@endsection