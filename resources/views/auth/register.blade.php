@extends('layouts.user-form')

@section('title', 'Register')

@section('form')
<div class="w-full h-full max-w-xs mx-auto my-20 md:max-w-md">

    <form class="bg-white px-8 pt-6 pb-8 mb-4" action="{{ route('auth.register') }}">
      <h2 class="font-bold py-5 text-center">
        Create an Account
      </h2>
      <div class="mb-4">
        <input class="shadow appearance-none border rounded w-full py-5 px-3
               text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
               id="name" type="text" placeholder="Full Name">
      </div>
      <div class="mb-4">
        <input class="shadow appearance-none border rounded w-full py-5 px-3
               text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
               id="email" type="email" placeholder="Email">
      </div>
      <div class="mb-4">
        <input class="shadow appearance-none border rounded w-full py-5 px-3
               text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
               id="username" type="text" placeholder="Username">
      </div>
      <div class="mb-4">
        <input class="shadow appearance-none border rounded w-full py-5 px-3
               text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
               id="password" type="password" placeholder="Password" required>
      </div>
      <div class="mb-6">
        <input class="shadow appearance-none border rounded w-full py-5 px-3 text-gray-700
               leading-tight focus:outline-none focus:shadow-outline"
               id="confirm-password" type="password" placeholder="Confirm Password" required>
      </div>
      <div class="flex items-center justify-between">
        <input class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded
               focus:outline-none focus:shadow-outline w-full cursor-pointer"
               type="submit" value="Register">
      </div>
    </form>
  </div>

@endsection