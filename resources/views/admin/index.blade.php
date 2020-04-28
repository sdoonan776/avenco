@extends('layouts.admin')

@section('title', 'Dashboard')

@section('admin')
	<div class="main-content flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">
		<a href="{{ route('admin.users.index') }}">
			<div class="p-4 m-3 w-full border">
				<h3>Users</h3>
			</div>
		</a>
		<a href="{{ route('admin.products.index') }}">
			<div class="p-4 m-3 w-full border">
				<h3>Products</h3>
			</div>
		</a>
		<a href="{{ route('admin.orders.index') }}">
			<div class="p-4 m-3 w-full border">
				<h3>Orders</h3>
			</div>
		</a>
		<a href="{{ route('admin.categories.index') }}">
			<div class="p-4 m-3 w-full border">
				<h3>Categories</h3>
			</div>
		</a>
		<a href="{{ route('admin.coupons.index') }}">
			<div class="p-4 m-3 w-full border">
				<h3>Coupons</h3>
			</div>
		</a>
	</div>
@endsection