@extends('layouts.main')

@section('title', 'Home')

@section('main')

    {{-- <div id="messages">
        @include('partials.errors')
        @include('partials.messages')
    </div> --}}
    
    <div class="banner">
        <img src="{{ asset('img/slider-1.jpg') }}" alt="First slide">
    </div>    
    
    <div class="wrapper">
        <section class="features-section">
            <div class="features-ads">                    
                <div class="single-features-ads first">
                    <img src="{{ asset('img/f-delivery.png') }}" alt="features-icon">
                    <h4>Free Shipping</h4>
                    <p>
                        Fusce urna quam, euismod sit amet mollis quis, vestibulum quis velit. Vesti bulum mal
                        esuada aliquet libero viverra cursus. 
                    </p>
                </div>
            
                <div class="single-features-ads second">
                    <img src="{{ asset('img/coin.png') }}" alt="features-icon">
                    <h4>100% Money Back </h4>
                    <p>
                        Urna quam, euismod sit amet mollis quis, vestibulum quis velit. Vesti bulum mal esuada
                        aliquet libero viverra cursus. 
                    </p>
                </div>
            
        
                <div class="single-features-ads">
                    <img src="{{ asset('img/chat.png') }}" alt="features-icon">
                    <h4>Online Support 24/7</h4>
                    <p>
                        Urna quam, euismod sit amet mollis quis, vestibulum quis velit. Vesti bulum mal esuada
                        aliquet libero viverra cursus. 
                    </p>
                </div>
            </div>
        </section>

        <section class="latest-products">
            <div class="section-title">
                <h2>Latest Products</h2>
            </div>                
            <div class="products">
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
    </div>
@endsection