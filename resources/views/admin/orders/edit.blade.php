@extends('layouts.admin')

@section('title', 'Orders')

@section('admin')
	<div class="admin-form">
		<form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
			@csrf
			@method('PATCH')
			<div class="admin-form-group">
				<label for="email">Email</label>
				<input type="email" name="email" value="{{ $order->email }}">
			</div>	
			<div class="admin-form-group">
				<label for="name">Name</label>
				<input type="text" name="name" value="{{ $order->name }}">
			</div>	
			<div class="admin-form-group">
				<label for="address_1">Address 1</label>
				<input type="text" name="address_1" value="{{ $order->address_1 }}">
			</div>	
			<div class="admin-form-group">
				<label for="address_2">Address 2</label>
				<input type="text" name="address_2" value="{{ $order->address_2 }}">
			</div>	
			<div class="admin-form-group">
				<label for="city">City</label>
				<input type="text" name="city" value="{{ $order->city }}">
			</div>	
			<div class="admin-form-group">
				<label for="country">Country</label>
				<input type="text" name="country" value="{{ $order->country }}">
			</div>	
			<div class="admin-form-group">
				<label for="postalcode">Postal Code</label>
				<input type="text" name="postalcode" value="{{ $order->postalcode }}">
			</div>	
			<div class="admin-form-group">
				<label for="name_on_card">Name on Card</label>
				<input type="text" name="name_on_card" value="{{ $order->name_on_card }}">
			</div>	
			<div class="admin-form-group">
				<label for="discount">Discount</label>
				<input type="number" name="discount" value="{{ $order->discount }}">
			</div>	
			<div class="admin-form-group">
				<label for="discount_code">Discount Code</label>
				<input type="text" name="discount_code" value="{{ $order->discount_code }}">
			</div>	
			<div class="admin-form-group">
				<label for="subtotal">SubTotal</label>
				<input type="number" name="subtotal" value="{{ $order->subtotal }}">
			</div>	
			<div class="admin-form-group">
				<label for="tax">Tax</label>
				<input type="number" name="tax" value="{{ $order->tax }}">
			</div>	
			<div class="admin-form-group">
				<label for="total">total</label>
				<input type="number" name="total" value="{{ $order->total }}">
			</div>	
			<div class="admin-form-group">
				<label for="shipped">Shipped</label>
				<input type="text" name="shipped" value="{{ $order->shipped }}">
			</div>	
			<div class="admin-form-group">
				<button class="admin-btn" type="submit">
					Update
				</button>
			</div>
		</form>	
	</div>
@endsection