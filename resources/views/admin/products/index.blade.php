@extends('layouts.admin')

@section('title', 'Products')

@section('admin')
		<div class="main-content flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">

		<div id="messages">
	        @include('partials.errors')
	        @include('partials.messages')
    	</div>
			
		<a href="{{ route('admin.products.create') }}" class="admin-btn">
			Create
		</a>
		<table class="table-fixed border my-5">
		  <thead>
		    <tr>
		      <th class="w-1/2 px-4 py-2">Id</th>
		      <th class="w-1/2 px-4 py-2">Name</th>
		      <th class="w-1/4 px-4 py-2">Quantity</th>
		      <th class="w-1/4 px-4 py-2">Price</th>
		      <th class="w-1/4 px-4 py-2"></th>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach ($products as $product)
			    <tr>
			      <td class="border px-4 py-2">{{ $product->id }}</td>
			      <td class="border px-4 py-2">{{ ucwords($product->name) }}</td>
			      <td class="border px-4 py-2">{{ $product->quantity }}</td>
			      <td class="border px-4 py-2">{{ priceFormat($product->price) }}</td>
			      <td class="border px-4 py-2">
			      	<a href="{{ route('admin.products.show', $product->id) }}">
			      		<i class="fas fa-info"></i>
			      	</a>
			      	<a href="{{ route('admin.products.edit', $product->id) }}">
			      		<i class="far fa-edit"></i>
			      	</a>
			      	<div class="admin-delete">
			      		<form action="{{ route('admin.products.destroy', $product->id) }}" method="POST">
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
	      {{ $products->appends(request()->input())->links() }}
	    </div>
	</div>
@endsection