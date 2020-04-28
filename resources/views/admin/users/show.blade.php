@extends('layouts.admin')

@section('title', 'Users' . $user->full_name)

@section('admin')

	<div class="container">
		<div class="show-group">
			<p>Full Name</p>
			<p>{{ $user->full_name }}</p>
		</div>
		<div class="show-group">
			<p>Email</p>
			<p>{{ $user->email }}</p>
		</div>
		<div class="show-group">
			<p>Username</p>
			<p>{{ $user->username }}</p>
		</div>
		<div class="show-group">
			<p>Registered At</p>
			<p>{{ date("d-m-Y", strtotime($user->registered_at)) }}</p>
		</div>
		<div class="show-group">
			<p>Orders</p>
			<p>{{ $user->orders->count() }}</p>
		</div>		
	</div>
@endsection