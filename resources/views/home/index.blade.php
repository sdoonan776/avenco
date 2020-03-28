@extends('layouts.main')

@section('title', 'Home')

@section('main')

    <section id="messages" class="conatiner">
        @if (session()->has('message'))
            <div class="alert alert-success" role="alert-success">
                {{ session()->get('message') }}
            </div>
        @endif

        @if(count($errors) > 0)
            <div class="alert alert-danger" role="alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </section>
    
   <section id="carousel" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselIndicators" data-slide-to="1"></li>
        <li data-target="#carouselIndicators" data-slide-to="2"></li>
      </ol>  
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="{{ asset('resources/assets/img/slider-1.jpg') }}" alt="First slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="{{ asset('resources/assets/img/slider-2.jpg') }}" alt="Second slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="{{ asset('resources/assets/img/slider-3.jpg') }}" alt="Third slide">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </section>

    <section class="features-section spad">
        <div class="features-ads">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="single-features-ads first">
                            <img src="{{ asset('resources/assets/img/icons/f-delivery.png') }}" alt="features-icon">
                            <h4>Free shipping</h4>
                            <p>Fusce urna quam, euismod sit amet mollis quis, vestibulum quis velit. Vesti bulum mal
                                esuada aliquet libero viverra cursus. </p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-features-ads second">
                            <img src="{{ asset('resources/assets/img/icons/coin.png') }}" alt="features-icon">
                            <h4>100% Money back </h4>
                            <p>Urna quam, euismod sit amet mollis quis, vestibulum quis velit. Vesti bulum mal esuada
                                aliquet libero viverra cursus. </p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-features-ads">
                            <img src="{{ asset('resources/assets/img/icons/chat.png') }}" alt="features-icon">
                            <h4>Online support 24/7</h4>
                            <p>Urna quam, euismod sit amet mollis quis, vestibulum quis velit. Vesti bulum mal esuada
                                aliquet libero viverra cursus. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="features-box">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="single-box-item first-box">
                                    <img src="{{ asset('resources/assets/img/f-box-1.jpg') }}" alt="features-image">
                                    <div class="box-text">
                                        <span class="trend-year">2020 Party</span>
                                        <h2>Jewelry</h2>
                                        <span class="trend-alert">Trend Allert</span>
                                        <a href="{{ route('shop.index') }}" class="primary-btn">See More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="single-box-item second-box">
                                    <img src="{{ asset('resources/assets/img/f-box-2.jpg') }}" alt="features-image">
                                    <div class="box-text">
                                        <span class="trend-year">2020 Trend</span>
                                        <h2>Footwear</h2>
                                        <span class="trend-alert">Bold & Black</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="single-box-item large-box">
                            <img src="{{ asset('resources/assets/img/f-box-3.jpg') }}" alt="features-image">
                            <div class="box-text">
                                <span class="trend-year">2020 Party</span>
                                <h2>Collection</h2>
                                <div class="trend-alert">Trend Allert</div>
                            </div>
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
                    </div>
                </div>
            </div>
            <div class="row" id="product-list">
                
                @foreach($products as $product)
                <div class="col-lg-3 col-sm-6 mix all dresses bags">
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
                </div>
                @endforeach 

            </div>
        </div>
    </section>
    <section class="lookbok-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 offset-lg-1">
                    <div class="lookbok-left">
                        <div class="section-title">
                            <h2>2019 <br />#lookbook</h2>
                        </div>
                        <p>Fusce urna quam, euismod sit amet mollis quis, vestibulum quis velit. Vestibulum malesuada
                            aliquet libero viverra cursus. Aliquam erat volutpat. Morbi id dictum quam, ut commodo
                            lorem. In at nisi nec arcu porttitor aliquet vitae at dui. Sed sollicitudin nulla non leo
                            viverra scelerisque. Phasellus facilisis lobortis metus, sit amet viverra lectus finibus ac.
                            Aenean non felis dapibus, placerat libero auctor, ornare ante. Morbi quis ex eleifend,
                            sodales nulla vitae, scelerisque ante. Nunc id vulputate dui. Suspendisse consectetur rutrum
                            metus nec scelerisque. s</p>
                        <a href="{{ route('shop.index') }}" class="primary-btn look-btn">See More</a>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="lookbok-pic">
                        <img src="{{ asset('resources/assets/img/lookbok.jpg') }}" alt="lookbok-image">
                        <div class="pic-text">fashion</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection