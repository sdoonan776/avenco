@extends('layouts.main')

@section('title', 'Home')

@section('main')
 <section class="hero-slider">
        <div class="hero-items owl-carousel">
            <div class="single-slider-item set-bg" style="background-image: url('{{ asset('resources/assets/img/slider-1.jpg')}}')">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1>2019</h1>
                            <h2>Lookbook.</h2>
                            <a href="#" class="primary-btn">See More</a>
                        </div>
                    </div>
                </div>
            </div>
         </div>
    </section> 

    <section class="latest-products spad">
        <div class="container">
            <div class="product-filter">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="section-title">
                            <h2>Latest Products</h2>
                        </div>
                        <ul class="product-controls">
                            <li data-filter="*">All</li>
                            <li data-filter=".dresses">Dresses</li>
                            <li data-filter=".bags">Bags</li>
                            <li data-filter=".shoes">Shoes</li>
                            <li data-filter=".accesories">Accesories</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row" id="product-list">
                @foreach($products as $product)
                <div class="col-lg-3 col-sm-6 mix all dresses bags">
                    <div class="single-product-item">
                        <figure>
                            <a href="{{ route('product.show', $product->id) }}">
                                <img src="{{ asset($product->product_image) }}" alt="{{ $product->name }}">
                            </a>
                        </figure>
                        <div class="product-text">
                            <h6>{{ $product->name }}</h6>
                            <p>${{ $product->price }}.00</p>
                        </div>
                    </div>
                </div>
                @endforeach                                                               
            </div>
        </div>
    </section>
@endsection