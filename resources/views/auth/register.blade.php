@extends('layouts.user-form')

@section('title', 'Register')

@section('form')
  <div class="limiter">
    <div class="container-register100">
      <div class="wrap-register100 p-t-50 p-b-90">
        <form class="register100-form validate-form flex-sb flex-w" method="post" action="{{ route('register') }}">
          @csrf
          
          <span class="register100-form-title p-b-51">
            Register
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
            <input class="input100" type="text" name="full_name" placeholder="Full Name" value="{{ old('') ?? '' }}" required>
            <span class="focus-input100"></span>
          </div>

          <div class="wrap-input100 validate-input m-b-16">
            <input class="input100" type="email" name="email" placeholder="Email" value="{{ old('') ?? '' }}" required>
            <span class="focus-input100"></span>
          </div>

          <div class="wrap-input100 validate-input m-b-16">
            <input class="input100" type="text" name="username" placeholder="Username" value="{{ old('') ?? '' }}" required>
            <span class="focus-input100"></span>
          </div>
          
          <div class="wrap-input100 m-b-16">
            <input class="input100" type="password" name="password" placeholder="Password" required>
            <span class="focus-input100"></span>
          </div>

          <div class="wrap-input100 validate-input m-b-16">
            <input class="input100" type="password" name="confirm_password" placeholder="Confirm Password" required>
            <span class="focus-input100"></span>
          </div>

          <div class="container-register100-form-btn m-t-17">
            <button class="register100-form-btn" type="submit" name="register">
              Register
            </button>
          </div>

        </form>
      </div>
    </div>
  </div>
@endsection