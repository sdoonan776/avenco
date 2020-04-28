@extends('layouts.admin')

@section('title', 'Coupons')

@section('admin')
	<div class="container">	
		<div class="show-group">
			<p>Code</p>
			<p>{{ $coupon->code }}</p>
		</div>
		<div class="show-group">
			<p>Type</p>
			<p>{{ $coupon->type }}</p>
		</div>
		<div class="show-group">
			<p>Percent Off</p>
			<p>{{ $coupon->percent_off }}</p>
		</div>		
	</div>
@endsection