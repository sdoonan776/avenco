@extends('layouts.admin')

@section('title', 'Coupons')

@section('admin')
	<div class="main-content flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">

		<div id="messages">
	        @include('partials.errors')
	        @include('partials.messages')
    	</div>
		
		<a href="{{ route('admin.coupons.create') }}" class="admin-btn">
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
			      		<i class="fas fa-info"></i>
			      	</a>
			      	<a href="{{ route('admin.coupons.edit', $coupon->id) }}">
			      		<i class="far fa-edit"></i>
			      	</a>
			      	<div>
			      		<form action="{{ route('admin.coupons.destroy', $coupon->id) }}" method="POST">
			      			@csrf
			      			@method('DELETE')
			      			<button type="submit">	
			      				<i class="fas fa-trash-alt"></i>
			      			</button>
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