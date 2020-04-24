@extends('layouts.admin')

@section('title', 'Categories')

@section('admin')
	<div class="main-content flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">
		<table class="table-fixed">
		  <thead>
		    <tr>
		      <th class="w-1/2 px-4 py-2">Id</th>
		      <th class="w-1/2 px-4 py-2">Name</th>
		      <th class="w-1/4 px-4 py-2"></th>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach ($categories as $category)
			    <tr>
			      <td class="border px-4 py-2">{{ $category->id }}</td>
			      <td class="border px-4 py-2">{{ $category->name }}</td>
			      <td class="border px-4 py-2">
			      	<a href="{{ route('admin.categories.show', $category->id) }}">
			      		Details
			      	</a>
			      	<a href="{{ route('admin.categories.edit', $category->id) }}">
			      		Edit
			      	</a>
			      	<div>
			      		<form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST">
			      			@csrf
			      			@method('DELETE')
			      			<button type="submit">Delete</button>
			      		</form>
			      	</div>
			      </td>
			    </tr>
			@endforeach    
		  </tbody>
		</table>

		<div class="pagination-links">
	      {{ $categories->appends(request()->input())->links() }}
	    </div>

		<div class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-5 mx-4 border border-blue-500 hover:border-transparent rounded w-24">
			<a href="{{ route('admin.categories.create') }}">Create</a>
		</div>
	</div>
@endsection