@extends('layouts.admin')

@section('title', 'Users')

@section('admin')
	<div class="main-content flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">

		<div id="messages">
	        @include('partials.errors')
	        @include('partials.messages')
    	</div>


		<a href="{{ route('admin.users.create') }}" class="admin-btn">
			Create
		</a>
		<table class="table-fixed border my-5">
		  <thead>
		    <tr>
		      <th class="w-1/2 px-4 py-2">Id</th>
		      <th class="w-1/2 px-4 py-2">Full Name</th>
		      <th class="w-1/4 px-4 py-2">Email</th>
		      <th class="w-1/4 px-4 py-2">Registered At</th>
		      <th class="w-1/4 px-4 py-2"></th>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach ($users as $user)
			    <tr>
			      <td class="border px-4 py-2">{{ $user->id }}</td>
			      <td class="border px-4 py-2">{{ $user->full_name }}</td>
			      <td class="border px-4 py-2">{{ $user->email }}</td>
			      <td class="border px-4 py-2">{{ date("d-m-Y", strtotime($user->registered_at)) }}</td>
			      <td class="border px-4 py-2">
			      	<a href="{{ route('admin.users.show', $user->id) }}">
			      		<i class="fas fa-info"></i>
			      	</a>
			      	<a href="{{ route('admin.users.edit', $user->id) }}">
			      		<i class="far fa-edit"></i>
			      	</a>
			      	<div class="admin-delete">
			      		<form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
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
	      {{ $users->appends(request()->input())->links() }}
	    </div>
	</div>
@endsection