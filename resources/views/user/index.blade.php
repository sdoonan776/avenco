@extends('layouts.main')

@section('title', 'Profile')

@section('main')
	<div class="wrapper">
		<div id="profile">
			@include('partials.profile-menu')
		</div>

		<div id="messages">
			@include('partials.messages')
			@include('partials.errors')
		</div>

		<div id="profile" class="border w-full lg:w-3/5 rounded-lg lg:rounded-l-lg lg:rounded-r-none shadow-2xl bg-white opacity-75 lg:mx-0">
	

		<div class="p-4 md:p-12 text-center lg:text-left">
			<div class="block lg:hidden rounded-full shadow-xl mx-auto -mt-16 h-48 w-48 bg-cover bg-center"></div>
			
			<h1 class="text-3xl font-bold pt-8 lg:pt-0">
				{{ ucwords($user->full_name) }}
			</h1>
			<div class="mx-auto lg:mx-0 w-4/5 pt-3 border-b-2 border-teal-500 opacity-25"></div>
			<p class="pt-4 text-base font-bold flex items-center justify-center lg:justify-start"> 
				What you do
			</p>
			<p class="pt-8 text-sm">
				Totally optional short description about yourself, what you do and so on.
			</p>
		</div>
	</div>	
</div>
@endsection

