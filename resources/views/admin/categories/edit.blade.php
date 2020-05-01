@extends('layouts.admin')

@section('title', 'Categories')

@section('admin')
	<div class="admin-form">
		<h3>Edit Category</h3>
		<form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
			@csrf
			@method('PATCH')
			<div class="admin-form-group">
				<label for="name">Name</label>
				<input type="text" name="name" value="{{ $category->name }}">
			</div>	
			<div class="admin-form-group">
				<button class="admin-btn" type="submit">
					Update
				</button>
			</div>
		</form>	
	</div>
@endsection