@extends('layouts.main')

@section('title', 'Home')

@section('main')
    <section class="latest-products spad">
        <div class="container">
            <div class="product-filter">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="section-title">
                            <h2>Latest Products</h2>
                        </div>
                        <ul class="product-controls">
                            @foreach($categories as $category)
                                <li data-filter="*">{{ $category->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row" id="product-list">
                
                @foreach($products as $product)
                <div class="col-lg-3 col-sm-6 mix all dresses bags">
                    <div class="single-product-item">
                        <figure>
                            <a href="{{ route('products.show', $product->id) }}">
                                <img src="{{ asset($product->product_image) }}" alt="{{ $product->name }}">
                            </a>
                        </figure>
                        <div class="product-text">
                            <h6>{{ ucfirst($product->name) }}</h6>
                            <p>${{ $product->price }}.00</p>
                        </div>
                    </div>
                </div>
                @endforeach 

            </div>
        </div>
    </section>
@endsection