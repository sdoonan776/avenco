@if (session()->has('success_message'))    
    <div class="notification flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">
        <i class="fas fa-info"></i>
        <p>{{ session()->get('success_message') }}</p>
    </div>
@endif
