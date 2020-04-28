@extends('layouts.admin')

@section('title', 'Categories')

@section('admin')
	<div class="container">
		<div class="show-group">
			<p>Id</p>
			<p>{{ $category->id }}</p>
		</div>
		<div class="show-group">
			<p>Name</p>
			<p>{{ $category->name }}</p>
		</div>
	</div>
@endsection