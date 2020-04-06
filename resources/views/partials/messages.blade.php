@if (session()->has('success_message'))
  <div class="alert bg-green-100 border border-green-400 text-green-700 px-4 py-3 mb-3 rounded relative" role="alert-success">
      {{ session()->get('success_message') }}
       <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
      		<i class="close cursor-pointer fas fa-times"></i>
  	   </span>
  </div>
@endif