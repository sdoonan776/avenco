@extends('layouts.admin')

@section('title', 'Coupons')

@section('admin')
	<div class="admin-forms">
		<h3>Edit Coupon</h3>
		<form action="{{ route('admin.coupons.update', $coupon->id) }}" method="POST">
			@csrf
			<div class="admin-form-group">
				<label for="code">Code</label>
				<input type="text" name="code" value="{{ $coupon->code }}">
			</div>	
			<div class="admin-form-group">
				<label for="type">Type</label>
				<input type="text" name="type" value="{{ $coupon->type }}">
			</div>	
			<div class="admin-form-group">
				<label for="percent_off">Percent Off</label>
				<input type="number" name="percent_off" value="{{ $coupon->percent_off }}">
			</div>	
			<div class="admin-form-group">
				<button class="admin-btn" type="submit">
					Update
				</button>
			</div>
		</form>	
	</div>
@endsection