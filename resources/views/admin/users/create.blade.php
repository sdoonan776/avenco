@extends('layouts.admin')

@section('title', 'Users')

@section('admin')
	<div>
		<form action="{{ route('admin.users.store') }}" method="POST">
			@csrf
			<div class="form-group">
				<label for="full_name">Full Name</label>
				<input type="text" name="full_name" value="{{ old('full_name') ?? '' }}">
			</div>
			<div class="form-group">
				<label for="email">Email</label>
				<input type="email" name="email" value="{{ old('email') ?? '' }}">
			</div>
			<div class="form-group">
				<label for="username">Username</label>
				<input type="text" name="username" value="{{ old('username') ?? '' }}">
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" name="password" value="{{ old('password') ?? '' }}">
			</div>
			<div class="form-group">
				<button type="submit">Create</button>
			</div>
		</form>	
	</div>	
@endsection