@if (session()->has('success_message'))
  <div class="alert bg-green-100 border border-green-400 text-green-700 px-4 py-3 mb-3 rounded relative" role="alert-success">
      {{ session()->get('success_message') }}
  </div>
@endif