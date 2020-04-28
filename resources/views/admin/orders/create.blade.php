@extends('layouts.admin')

@section('title', 'Orders')

@section('admin')
	<div class="admin-form">
		<form action="{{ route('admin.orders.store') }}" method="POST">
			@csrf
			<div class="admin-form-group">
				<label for="email">Email</label>
				<input type="email" name="email" value="{{ old('email') ?? '' }}">
			</div>	
			<div class="admin-form-group">
				<label for="name">Name</label>
				<input type="text" name="name" value="{{ old('name') ?? '' }}">
			</div>	
			<div class="admin-form-group">
				<label for="address_1">Address 1</label>
				<input type="text" name="address_1" value="{{ old('address_1') ?? '' }}">
			</div>	
			<div class="admin-form-group">
				<label for="address_2">Address 2</label>
				<input type="text" name="address_2" value="{{ old('address_2') ?? '' }}">
			</div>	
			<div class="admin-form-group">
				<label for="city">City</label>
				<input type="text" name="city" value="{{ old('city') ?? '' }}">
			</div>	
			<div class="admin-form-group">
				<label for="country">Country</label>
				<input type="text" name="country" value="{{ old('country') ?? '' }}">
			</div>	
			<div class="admin-form-group">
				<label for="postalcode">Postal Code</label>
				<input type="text" name="postalcode" value="{{ old('postalcode') ?? '' }}">
			</div>	
			<div class="admin-form-group">
				<label for="name_on_card">Name on Card</label>
				<input type="text" name="name_on_card" value="{{ old('name_on_card') ?? '' }}">
			</div>	
			<div class="admin-form-group">
				<label for="discount">Discount</label>
				<input type="number" name="discount" value="{{ old('discount') ?? '' }}">
			</div>	
			<div class="admin-form-group">
				<label for="discount_code">Discount Code</label>
				<input type="text" name="discount_code" value="{{ old('discount_code') ?? '' }}">
			</div>	
			<div class="admin-form-group">
				<label for="subtotal">SubTotal</label>
				<input type="number" name="subtotal" value="{{ old('subtotal') ?? '' }}">
			</div>	
			<div class="admin-form-group">
				<label for="tax">Tax</label>
				<input type="number" name="tax" value="{{ old('tax') ?? '' }}">
			</div>	
			<div class="admin-form-group">
				<label for="total">total</label>
				<input type="number" name="total" value="{{ old('total') ?? '' }}">
			</div>	
			<div class="admin-form-group">
				<label for="shipped">Shipped</label>
				<input type="text" name="shipped" value="{{ old('shipped') ?? '' }}">
			</div>	
			<div class="admin-form-group">
				<button type="submit">
					Create
				</button>
			</div>
		</form>	
	</div>		
@endsection