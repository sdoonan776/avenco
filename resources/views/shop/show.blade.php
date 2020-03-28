@extends('layouts.main')

@section('title', ucwords($product->name))

@section('main')

<section class="page-add">
    <div class="container">
        <div class="row">
            <div class="col-lg-10">
                 @component('partials.breadcrumbs')
                    <a href="/">Home</a>
                    <a href="/shop">Shop</a>
                    <span>{{ ucwords($product->name) }}</span>
                @endcomponent
            </div>
        </div>
    </div>
</section>
<section class="product-page spad-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="product-img">
                        <img src="{{ asset($product->product_image) }}" alt="{{ $product->name }}">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product-content">
                        <h2>{{ ucwords($product->name) }}</h2>
                        <div class="pc-meta">
                            <h5>{{ priceFormat($product->price) }}</h5>
                        </div>
                        <p>{{ $product->description }}</p>
                        <ul class="tags">
                            <li><span>Category : </span>{{ $product->categories->name }}</li>
                        </ul>
                        @if ($product->quantity > 0)
                            <div class="pc-btn">
                                <form action="{{ route('cart.store', $product) }}" method="POST">
                                    {{ csrf_field() }}
                                    <button class="btn btn-secondary" type="submit">Add to Cart</button>
                                </form>
                            </div>
                        @else 
                            <div>
                                <span>This Product is currently out of stock</span>  
                                <a class="btn btn-secondary" href="{{ route('shop.index') }}">
                                    Go Back to Shop
                                </a>
                            </div>
                        @endif    
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection