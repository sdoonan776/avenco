@extends('layouts.main')

@section('title', 'Order - ' . $order->id)

@section('main')
	<div class="wrapper">
		
		<div id="profile-menu">
			@include('partials.profile-menu')
		</div>

		<div id="messages">
			@include('partials.messages')
			@include('partials.errors')
		</div>

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

            <div class="order-products">
                <div class="order-detail">
                    <span>Name</span>
                    <p>{{ ucwords($order->name) }}</p>
                </div>
                <div class="order-detail">
                    <span>Address</span>
                    <p>{{ $order->address_1 }}</p>
                    <p>{{ $order->address_2 }}</p>
                </div>
                <div class="order-detail">
                    <span>City</span>
                    <p>{{ $order->city }}</p>
                </div>
                <div class="order-detail">
                    <span>Subtotal</span>
                    <p>{{ priceFormat($order->subtotal) }}</p>
                </div>
                <div class="order-detail">
                    <span>Tax</span>
                    <p>{{ priceFormat($order->tax) }}</p>
                </div>
                <div class="order-detail">
                    <span>Total</span>
                    <p>{{ priceFormat($order->total) }}</p>
                </div>
            </div>
        </div> 

        <div class="order-container">

            <div class="order-header-items">
                <h5>
                    Order Items
                </h5>
            </div>

            <div class="order-products">
                @foreach ($products as $product)
                    <div class="order-product-item">

                        <img src="{{ asset($product->product_image) }}" alt="Product Image">
    
                        <a href="{{ route('shop.show', $product->slug) }}">
                            <p>
                                {{ ucwords($product->name) }}
                            </p>
                        </a>
                        <p class="price">
                            {{ priceFormat($product->price) }}
                        </p>
                        <p class="quantity">
                            Quantity: {{ $product->pivot->quantity }}
                        </p>
                    
                    </div>
                @endforeach
            </div>
        </div> 
    </div>
@endsection