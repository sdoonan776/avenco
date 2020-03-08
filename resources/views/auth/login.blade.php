@extends('layouts.user-form')

@section('title', 'Login')

@section('form')
  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100 p-t-50 p-b-90">
        <form class="login100-form validate-form flex-sb flex-w" method="POST" action="{{ route('login') }}">
          @csrf

          <span class="login100-form-title p-b-51">
            Login to Continue
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
          
          <div class="wrap-input100 validate-input m-b-16">
            <input class="input100" type="password" name="password" placeholder="Password">
            <span class="focus-input100"></span>
          </div>
          
          <div class="flex-sb-m w-full p-t-3 p-b-24">
            <div class="contact100-form-checkbox">
              <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
              Remember me                    
            </div>

            <div>
              <a href="#" class="txt1">
                Forgot Password?
              </a>
            </div>
          </div>

          <div class="container-login100-form-btn m-t-17">
            <button class="login100-form-btn">
              Login
            </button>
          </div>

          <div class="container-login100-form-btn m-t-17">
            <p class="">
              Don't have an account? 
              <a href="{{ route('register') }}">
                SIGN UP
              </a>
            </p>
          </div>

        </form>
      </div>
    </div>
  </div>
@endsection