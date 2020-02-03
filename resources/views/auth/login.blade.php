@extends('layouts.user-form')

@section('title', 'Login')

@section('form')
	
	<div class="w-full max-w-xs mx-auto my-20 border-transparent md:max-w-md">

    @if(\Session::has('message'))
      <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
          <strong class="font-bold">
              {{ \Session::get('message') }}
          </strong>
      </div>
    @endif

    <form class="bg-white rounded px-8 pt-6 pb-8 mb-4" action="{{ route('auth.login') }}">
      {{ csrf_field() }}
      <h2 class="font-bold py-5 text-center">Login to Continue</h2>
      <div class="mb-4">
        <input class="shadow appearance-none border rounded w-full py-5 px-3 text-gray-700
               leading-tight focus:outline-none focus:shadow-outline"
               id="email" type="email" placeholder="Email" required>
      </div>
      <div class="mb-6">
        <input class="shadow appearance-none border rounded w-full py-5 px-3 text-gray-700
               mb-3 leading-tight focus:outline-none focus:shadow-outline"
               id="password" type="password" placeholder="Password" required>
      </div>
      <div class="flex items-center justify-between mb-6">
        <div class="remember-me flex items-center">
          <input class="mr-1 text-blue-500" type="checkbox" id="remember-me"/>
          <label class="text-xs" for="remember-me"> Remember me </label>
        </div>
        <a href="{{ route('auth.login') }}" class="inline-block align-baseline font-bold
          text-sm text-green-500 hover:text-green-800">
          Forgot Password?
        </a>
      </div>
      <div class="flex items-center justify-between mb-6">
        <input class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded w-full
               focus:outline-none focus:shadow-outline cursor-pointer"
               type="submit" value="Login">
      </div>
      <div class="sign-up items-center justify-between mb-6">
         <a class="text-right text-green-500 hover:text-green-800" href="{{ route('auth.register') }}">
            SIGN UP
         </a>
      </div>
    </form>
  </div>
@endsection