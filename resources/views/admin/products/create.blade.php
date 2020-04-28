@extends('layouts.admin')

@section('title', 'Products')

@section('admin')
	<div class="admin-form">
		<form action="{{ route('admin.products.store') }}" method="POST">
			@csrf
			<div class="admin-form-group">
				<label for="name">Name</label>
				<input type="text" name="name" value="{{ old('name') ?? '' }}">
			</div>	
			<div class="admin-form-group">
				<label for="description">Description</label>
				<textarea placeholder="{{ old('description') ?? '' }}"></textarea>			
			</div>	
			<div class="admin-form-group">
				<label for="quantity">Quantity</label>
				<input type="number" name="quantity" value="{{ old('quantity') ?? '' }}">
			</div>	
			<div class="admin-form-group">
				<label for="price">Price</label>
				<input type="number" name="price" value="{{ old('price') ?? '' }}">
			</div>	
			<div class="admin-form-group">
				<label for="product_image">Image</label>
				<input type="" name="product_image" value="{{ old('product_image') ?? '' }}">
			</div>	
			<div class="admin-form-group">
				<button class="admin-btn" type="submit">
					Create
				</button>
			</div>
		</form>	
	</div>	
@endsection