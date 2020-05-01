@extends('layouts.admin')

@section('title', 'Orders')

@section('admin')
	<div class="main-content flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">

		<div id="messages">
	        @include('partials.errors')
	        @include('partials.messages')
    	</div>
		
		<table class="table-fixed border my-5">
		  <thead>
		    <tr>
		      <th class="w-1/2 px-4 py-2">Id</th>
		      <th class="w-1/4 px-4 py-2">Created At</th>
		      <th class="w-1/4 px-4 py-2">Total</th>
		      <th class="w-1/4 px-4 py-2"></th>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach ($orders as $order)
			    <tr>
			      <td class="border px-4 py-2">{{ $order->id }}</td>
			      <td class="border px-4 py-2">{{ date("d-m-Y", strtotime($order->created_at)) }}</td>
			      <td class="border px-4 py-2">{{ priceFormat($order->total) }}</td>
			      <td class="border px-4 py-2">
			      	<a href="{{ route('admin.orders.show', $order->id) }}">
			      		<i class="fas fa-info"></i>
			      	</a>
			      	<a href="{{ route('admin.orders.edit', $order->id) }}">
			      		<i class="far fa-edit"></i>
			      	</a>
			      	<div>
			      		<form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST">
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
	      {{ $orders->appends(request()->input())->links() }}
	    </div>
	</div>
@endsection