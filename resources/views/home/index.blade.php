@extends('layouts.main')

@section('title', 'Home')

@section('main')

    <div id="messages">
        @include('partials.errors')
        @include('partials.messages')
    </div>
    
    <div class="carousel">
        @include('partials.carousel')    
    </div>    
    
    <div class="wrapper">
        <section class="features-section">
            <div class="features-ads">                    
                <div class="single-features-ads first">
                    <img src="{{ asset('resources/assets/img/icons/f-delivery.png') }}" alt="features-icon">
                    <h4>Free Shipping</h4>
                    <p>Fusce urna quam, euismod sit amet mollis quis, vestibulum quis velit. Vesti bulum mal
                        esuada aliquet libero viverra cursus. </p>
                </div>
            
                <div class="single-features-ads">
                    <img src="{{ asset('resources/assets/img/icons/coin.png') }}" alt="features-icon">
                    <h4>100% Money Back </h4>
                    <p>Urna quam, euismod sit amet mollis quis, vestibulum quis velit. Vesti bulum mal esuada
                        aliquet libero viverra cursus. </p>
                </div>
            
        
                <div class="single-features-ads">
                    <img src="{{ asset('resources/assets/img/icons/chat.png') }}" alt="features-icon">
                    <h4>Online Support 24/7</h4>
                    <p>Urna quam, euismod sit amet mollis quis, vestibulum quis velit. Vesti bulum mal esuada
                        aliquet libero viverra cursus. </p>
                </div>
            </div>
            <div class="features-box">
                <div class="single-box-item first-box">
                    <img src="{{ asset('resources/assets/img/f-box-1.jpg') }}" alt="features-image">
                    <div class="box-text">
                        <span class="trend-year">2020 Party</span>
                        <h2>Jewelry</h2>
                        <span class="trend-alert">Trend Allert</span>
                        <a href="{{ route('shop.index') }}" class="primary-btn">See More</a>
                    </div>
                </div>
                <div class="single-box-item second-box">
                    <img src="{{ asset('resources/assets/img/f-box-2.jpg') }}" alt="features-image">
                    <div class="box-text">
                        <span class="trend-year">2020 Trend</span>
                        <h2>Footwear</h2>
                        <span class="trend-alert">Bold & Black</span>
                    </div>
                </div>
                <div class="single-box-item third-box">
                    <img src="{{ asset('resources/assets/img/f-box-3.jpg') }}" alt="features-image">
                    <div class="box-text">
                        <span class="trend-year">2020 Party</span>
                        <h2>Collection</h2>
                        <div class="trend-alert">Trend Allert</div>
                    </div>
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