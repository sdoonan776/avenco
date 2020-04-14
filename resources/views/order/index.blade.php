@extends('layouts.main')

@section('title', 'Orders')

@section('main')
	<div class="wrapper" id="orders">
        
    	<div id="profile-menu">
			@include('partials.profile-menu')
		</div>

    	<div class="orders">
	    	@foreach ($orders as $order)
                <div class="order-container">
                    <div class="order-items">

                        <div class="order-item">
                            <span>Order Placed</span>
                            <p>{{ $order->created_at }}</p>
                        </div>

                        <div class="order-item">
                            <span>Order ID</span>
                            <p>{{ $order->id }}</p>
                        </div>

                        <div class="order-item">
                            <span>Total</span>
                            <p>{{ priceFormat($order->total) }}</p>
                        </div>

                    </div>

                    <div class="order-items">
                        <a class="site-btn" href="{{ route('order.show', $order->id) }}">
                        	Order Details
                        </a>            
                    </div>

                    <div class="order-products">
                        @foreach ($order->products as $product)
                            <div class="order-product-item">
                                <img src="{{ asset($product->product_image) }}" alt="Product Image">
                                <a href="{{ route('shop.show', $product->slug) }}">
                                    <p>
                                        {{ ucwords($product->name) }}
                                    </p>
                                </a>
                                <p>{{ priceFormat($product->price) }}</p>
                                <p>Quantity: {{ $product->pivot->quantity }}</p>
                            </div>
                        @endforeach
                    </div>
                </div> 
            @endforeach
		</div>
	</div>
@endsection