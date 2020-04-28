@extends('layouts.admin')

@section('title', 'Products')

@section('admin')
		<div class="main-content flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">
		<a href="{{ route('admin.products.create') }}" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-5 border border-blue-500 hover:border-transparent rounded w-24">
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
			      		Details
			      	</a>
			      	<a href="{{ route('admin.products.edit', $product->id) }}">
			      		Edit
			      	</a>
			      	<div>
			      		<form action="{{ route('admin.products.destroy', $product->id) }}" method="POST">
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
	      {{ $products->appends(request()->input())->links() }}
	    </div>
	</div>
@endsection