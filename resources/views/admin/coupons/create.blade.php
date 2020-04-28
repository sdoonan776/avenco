@extends('layouts.admin')

@section('title', 'Coupons')

@section('admin')
	<div class="admin-form">
		<form action="{{ route('admin.coupons.store') }}" method="POST">
			@csrf
			<div class="admin-form-group">
				<label for="code">Code</label>
				<input type="text" name="code" value="{{ old('code') ?? '' }}">
			</div>	
			<div class="admin-form-group">
				<label for="type">Type</label>
				<input type="text" name="type" value="{{ old('type') ?? '' }}">
			</div>	
			<div class="admin-form-group">
				<label for="percent_off">Percent Off</label>
				<input type="number" name="percent_off" value="{{ old('percent_off') ?? '' }}">
			</div>	
			<div class="admin-form-group">
				<button class="admin-btn" type="submit">
					Create
				</button>
			</div>
		</form>	
	</div>
@endsection