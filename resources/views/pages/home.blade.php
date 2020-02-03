@extends('layouts.main')

@section('title', 'Home')

@section('main')
    <section class="bg-white py-8 w-9/12 mx-auto">

        <div class="container flex items-center justify-around flex-wrap pt-4 pb-12">

           @foreach($products as $product)
            <div class="product-container w-full mx-6 md:w-1/3 xl:w-1/4 p-6 flex flex-col">
                <a href="{{ route('product.show', $product->id) }}">
                    <div role="product-image" class="w-full h-full">
                        <img src="{{ url($product->product_image)  }}" alt="{{ $product->name }}">
                    </div>
                    
                    <div class="pt-3 flex items-center justify-between">
                        <p>{{ $product->name }}</p>
                    </div>
                    <p class="pt-1 text-gray-900">£{{ $product->price }}.00</p>
                </a>
                <div class="flex mt-3">
                    <a class="product-btn mr-4" href="{{ route('product.show', $product->id) }}">
                        Details
                    </a>
                    <a class="product-btn" href="">Add Cart</a>
                </div>

            </div>
           @endforeach 
    	</div>
    </section>
@endsection