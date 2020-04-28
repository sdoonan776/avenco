@extends('layouts.admin')

@section('title', 'Coupons')

@section('admin')
	<div class="main-content flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">
		<a href="{{ route('admin.coupons.create') }}" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-5 border border-blue-500 hover:border-transparent rounded w-24">
			Create
		</a>
		<table class="table-fixed border my-5">
		  <thead>
		    <tr>
		      <th class="w-1/2 px-4 py-2">Id</th>
		      <th class="w-1/2 px-4 py-2">Code</th>
		      <th class="w-1/4 px-4 py-2">Type</th>
		      <th class="w-1/4 px-4 py-2">Percent Off</th>
		      <th class="w-1/4 px-4 py-2"></th>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach ($coupons as $coupon)
			    <tr>
			      <td class="border px-4 py-2">{{ $coupon->id }}</td>
			      <td class="border px-4 py-2">{{ $coupon->code }}</td>
			      <td class="border px-4 py-2">{{ $coupon->type }}</td>
			      <td class="border px-4 py-2">{{ percentage($coupon->percent_off) }}</td>
			      <td class="border px-4 py-2">
			      	<a href="{{ route('admin.coupons.show', $coupon->id) }}">
			      		Details
			      	</a>
			      	<a href="{{ route('admin.coupons.edit', $coupon->id) }}">
			      		Edit
			      	</a>
			      	<div>
			      		<form action="{{ route('admin.coupons.destroy', $coupon->id) }}" method="POST">
			      			@csrf
			      			@method('DELETE')
			      			<button class="admin-btn" type="submit">Delete</button>
			      		</form>
			      	</div>
			      </td>
			    </tr>
			@endforeach    
		  </tbody>
		</table>

		<div class="pagination-links">
	      {{ $coupons->appends(request()->input())->links() }}
	    </div>
	</div>
@endsection