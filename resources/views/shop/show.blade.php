@extends('layouts.main')

@section('title', ucwords($product->name))

@section('main')
<div class="wrapper">

    <div class="breadcrumbs">
        <a href="/">Home /</a>
        <a href="/shop">Shop /</a>
        <span>{{ ucwords($product->name) }}</span>
    </div>

    <div id="messages">
        @include('partials.errors')
        @include('partials.messages')
    </div>

    <section class="product-page">
        <div class="product-img">
            <a href="{{ asset($product->product_image) }}">
                <img src="{{ asset($product->product_image) }}" alt="{{ $product->name }}">
            </a>
        </div>                
        <div class="product-content">
            <h2>{{ ucwords($product->name) }}</h2>
            <h5>{{ priceFormat($product->price) }}</h5>
            <p>{{ $product->description }}</p>
            <ul class="tags">
                <li><span>Category : </span>{{ $product->categories->name }}</li>
            </ul>
            @if ($product->quantity > 0)
                <div class="quantity-container">
                    <input class="quantity" name="quantity" type="text" value="">
                </div>
                <div class="cart-btn">
                    <form action="{{ route('cart.store', $product) }}" method="POST">
                        @csrf
                        <button type="submit" class="site-btn">
                            Add to Cart
                        </button>
                    </form>
                </div>
            @else 
                <div class="out-of-stock">
                    <span>This Product is currently out of stock</span>  
                </div>
            @endif    
            <a class="site-btn" href="{{ route('shop.index') }}">
                Go Back to Shop
            </a>
        </div>
    </section>
</div>
@endsection