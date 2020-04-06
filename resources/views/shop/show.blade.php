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
                <input class="quantity" type="number" id="quantity" name="quantity" data-productQuantity="">
                <div class="cart-btn">
                    <form action="{{ route('cart.store', $product) }}" method="POST">
                        {{ csrf_field() }}
                        <button type="submit" class="site-btn">
                            Add to Cart
                        </button>
                    </form>
                </div>
            @else 
                <div>
                    <span>This Product is currently out of stock</span>  
                    <a class="site-btn" href="{{ route('shop.index') }}">
                        Go Back to Shop
                    </a>
                </div>
            @endif    
        </div>
    </section>
</div>
@endsection