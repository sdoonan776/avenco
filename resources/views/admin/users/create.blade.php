@extends('layouts.admin')

@section('title', 'Users')

@section('admin')
	<div class="admin-form">
		<h3>Create User</h3>
		<form action="{{ route('admin.users.store') }}" method="POST">
			@csrf
			<div class="admin-form-group">
				<label for="full_name">Full Name</label>
				<input type="text" name="full_name" value="{{ old('full_name') ?? '' }}">
			</div>
			<div class="admin-form-group">
				<label for="email">Email</label>
				<input type="email" name="email" value="{{ old('email') ?? '' }}">
			</div>
			<div class="admin-form-group">
				<label for="username">Username</label>
				<input type="text" name="username" value="{{ old('username') ?? '' }}">
			</div>
			<div class="admin-form-group">
				<label for="password">Password</label>
				<input type="password" name="password">
			</div>
			<div class="admin-form-group">
				<button class="admin-btn" type="submit">
					Create
				</button>
			</div>
		</form>	
	</div>	
@endsection