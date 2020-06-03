@extends('layouts.main')

@section('title', $categoryName)

@section('main')
<div class="wrapper">
    
    <div id="messages">
        @include('partials.messages')
        @include('partials.errors')
    </div>

    <div class="breadcrumbs">
        <h2>{{ $categoryName }}</h2>
        <a href="/">Home /</a>
        <span>Shop</span>
    </div>
            
    <section class="shop-container">
        <div class="categories-filter">
            <ul>
                @foreach($categories as $category)
                <li>
                    <a href="{{ route('shop.index', ['category' => $category->slug]) }}">
                        {{ $category->name }}
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
         <div class="product-list">                
            @foreach($products as $product)
                <div class="single-product-item">
                    <figure>
                        <a href="{{ route('shop.show', $product->slug) }}">
                            <img src="{{ asset($product->product_image) }}" alt="{{ $product->name }}">
                        </a>
                    </figure>
                    <div class="product-text">
                        <h6>{{ ucwords($product->name) }}</h6>
                        <p>{{ priceFormat($product->price) }}</p>
                    </div>
                </div>
            @endforeach 
        </div>
    </section>
    {{-- <div class="pagination-links">
      {{ $products->appends(request()->input())->links() }}
    </div> --}}
</div>
@endsection