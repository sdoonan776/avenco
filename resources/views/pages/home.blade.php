@extends('layouts.main')

@section('title', 'Home')

@section('main')
      <section class="bg-white py-8 w-9/12 mx-auto">

        <div class="container mx-auto flex items-center flex-wrap pt-4 pb-12">

           @foreach($products as $product)
            <div class="w-full md:w-1/3 xl:w-1/4 p-6 flex flex-col">
                <a href="{{ route('show.product', $product->id) }}">
                    <div role="product-image" class="">
                        
                    </div>
                    
                    <div class="pt-3 flex items-center justify-between">
                        <p>{{ $product->name }}</p>
                    </div>
                    <p class="pt-1 text-gray-900">£{{ $product->price }}.00</p>
                </a>
            </div>
           @endforeach 
    	</div>
    </section>
@endsection