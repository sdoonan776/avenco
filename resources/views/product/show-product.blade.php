@extends('layouts.main')

@section('title', $product->name)

@section('main')

<section class="product-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="product-slider owl-carousel">
                        <div class="product-img">
                            <figure>
                                <img src="{{ asset('resources/assets/img/products' . $product->product_image) }}" alt="{{ $product->name }}">
                            </figure>
                        </div>
                        {{-- <div class="product-img">
                            <figure>
                                <img src="img/product/product-1.jpg" alt="">
                            </figure>
                        </div> --}}
                    </div> 
                </div>
                <div class="col-lg-6">
                    <div class="product-content">
                        <h2>{{ $product->name }}</h2>
                        <div class="pc-meta">
                            <h5>${{ $product->price }}.00</h5>
                        </div>
                        <p>{{ $product->description }}</p>
                        <ul class="tags">
                            <li><span>Category :</span>{{ $product->name }}</li>
                        </ul>
                        <div class="product-quantity">
                            <div class="pro-qty">
                                <input type="text" value="1">
                            </div>
                        </div>
                        <a {{-- href="{{ route('') }}" --}} class="primary-btn pc-btn">Add to cart</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection