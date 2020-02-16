@extends('layouts.main')

@section('title', ucfirst($product->name))

@section('main')

<section class="page-add">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                 @component('partials.breadcrumbs')
                    <a href="/">Home</a>
                    <a href="/shop">Shop</a>
                    <span>{{ $product->name }}</span>
                @endcomponent
            </div>
        </div>
    </div>
</section>
<section class="product-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="product-slider owl-carousel">
                        <div class="product-img">
                            <img src="{{ asset($product->product_image) }}" alt="{{ $product->name }}">
                        </div>
                    </div> 
                </div>
                <div class="col-lg-6">
                    <div class="product-content">
                        <h2>{{ ucfirst($product->name) }}</h2>
                        <div class="pc-meta">
                            <h5>{{ priceFormat($product->price) }}</h5>
                        </div>
                        <p>{{ $product->description }}</p>
                        <ul class="tags">
                            <li><span>Category : </span>{{ $product->category->name }}</li>
                        </ul>
                        <div class="product-quantity">
                            <div class="pro-qty">
                                <input type="text" value="1">
                            </div>
                        </div>
                        @if ($product->quantity > 0)
                            <form action="{{ route('cart.store', $product) }}" method="POST">
                                {{ csrf_field() }}
                                <button type="submit" class="primary-btn pc-btn">Add to Cart</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection