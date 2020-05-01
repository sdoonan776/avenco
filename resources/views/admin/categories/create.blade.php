@extends('layouts.admin')

@section('title', 'Categories')

@section('admin')
	<h3>Create Category</h3>
	<div class="admin-form">
		<form action="{{ route('admin.categories.store') }}" method="POST">
			@csrf
			<div class="admin-form-group">
				<label for="name">Name</label>
				<input type="text" name="name" value="{{ old('name') ?? '' }}">
			</div>	
			<div class="admin-form-group">
				<button class="admin-btn" type="submit">
					Create
				</button>
			</div>
		</form>	
	</div>	
@endsection