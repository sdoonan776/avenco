@if(count($errors) > 0)
  <div class="alert bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-3" role="alert">
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
      <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
      	<i class="close cursor-pointer fas fa-times"></i>
  	  </span>
  </div>
@endif