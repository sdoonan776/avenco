@extends('layouts.admin')

@section('title', 'Products')

@section('admin')
	<div class="container">
		<div class="show-group">
			<p>Description</p>
			<p>{{ $product->description }}</p>
		</div>
		<div class="show-group">
			<p>Quantity</p>
			<p>{{ $product->quantity }}</p>
		</div>
		<div class="show-group">
			<p>Price</p>
			<p>{{ priceFormat($product->price) }}</p>
		</div>
	</div>
@endsection