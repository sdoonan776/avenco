@extends('layouts.admin')

@section('title', 'Orders')

@section('admin')
	<div class="container">
		<div class="show-group">
			<p>Email</p>
			<p>{{ $order->email }}</p>
		</div>
		<div class="show-group">
			<p>Name</p>
			<p>{{ $order->name }}</p>
		</div>
		<div class="show-group">
			<p>Address 1</p>
			<p>{{ $order->address_1 }}</p>
		</div>
		<div class="show-group">
			<p>Address 2</p>
			<p>{{ $order->address_2 }}</p>
		</div>
		<div class="show-group">
			<p>City</p>
			<p>{{ $order->city }}</p>
		</div>
		<div class="show-group">
			<p>Country</p>
			<p>{{ $order->country }}</p>
		</div>
		<div class="show-group">
			<p>Postal Code</p>
			<p>{{ $order->postalcode }}</p>
		</div>
		<div class="show-group">
			<p>Name on Card</p>
			<p>{{ $order->name_on_card }}</p>
		</div>
		<div class="show-group">
			<p>Discount</p>
			<p>{{ $order->discount }}</p>
		</div>
		<div class="show-group">
			<p>Discount Code</p>
			<p>{{ $order->discount_code }}</p>
		</div>
		<div class="show-group">
			<p>Subtotal</p>
			<p>{{ $order->subtotal }}</p>
		</div>
		<div class="show-group">
			<p>Tax</p>
			<p>{{ $order->tax }}</p>
		</div>
		<div class="show-group">
			<p>Total</p>
			<p>{{ $order->total }}</p>
		</div>
		<div class="show-group">
			<p>Shipped</p>
			<p>{{ $order->shipped }}</p>
		</div>
	</div>	
@endsection