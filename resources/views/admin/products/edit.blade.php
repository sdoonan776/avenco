@extends('layouts.admin')

@section('title', 'Products')

@section('admin')
	<div class="admin-form">
		<h3>Edit Product</h3>
		<form action="{{ route('admin.products.update', $product->id) }}" method="POST">
			@csrf
			@method('PATCH')
			<div class="admin-form-group">
				<label for="name">Name</label>
				<input type="text" name="name" value="{{ $product->name }}">
			</div>	
			<div class="admin-form-group">
				<label for="description">Description</label>
				<textarea name="description">{{ $product->description }}</textarea>			
			</div>	
			<div class="admin-form-group">
				<label for="quantity">Quantity</label>
				<input type="number" name="quantity" value="{{ $product->quantity }}">
			</div>	
			<div class="admin-form-group">
				<label for="price">Price</label>
				<input type="number" name="price" value="{{ priceFormat($product->price) }}">
			</div>	
			<div class="admin-form-group">
				<button class="admin-btn" type="submit">
					Update
				</button>
			</div>
		</form>	
	</div>
@endsection