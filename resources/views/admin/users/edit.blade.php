@extends('layouts.admin')

@section('title', 'Users')

@section('admin')
	<div class="admin-form">
		<h3>Edit User</h3>
		<form action="{{ route('admin.users.update', $user->id) }}" method="POST">
			@csrf
			@method('PATCH')
			<div class="admin-form-group">
				<label for="full_name">Full Name</label>
				<input type="text" name="full_name" value="{{ $user->full_name }}">
			</div>
			<div class="admin-form-group">
				<label for="email">Email</label>
				<input type="email" name="email" value="{{ $user->email }}">
			</div>
			<div class="admin-form-group">
				<label for="username">Username</label>
				<input type="text" name="username" value="{{ $user->username }}">
			</div>
			<div class="admin-form-group">
				<label for="password">Password</label>
				<input type="password" name="password">
			</div>
			<div class="admin-form-group">
				<button class="admin-btn" type="submit">
					Update
				</button>
			</div>
		</form>
	</div>
@endsection