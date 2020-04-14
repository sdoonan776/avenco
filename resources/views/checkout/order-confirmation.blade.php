@extends('layouts.main')

@section('title', 'Order Confirmed')

@section('main')
<div class="wrapper">
	<div class="order-message">
		<i class="far fa-check-circle fa-5x"></i>	
		<span>Your order has been successfully placed</span>
		<span>Your Order number is {{ $order->id }}</span>
	</div>
	<div class="order-details">
		<h5>Order Summary</h5>
            @foreach($order->products as $orderProduct)
                <div class="order-item">
                    <div class="item-group">
                        <span>Product</span>
                        <p>{{ ucwords($orderProduct->name) }}</p>
                    </div>
                    <div class="item-group">
                        <span>Price</span>
                        <p>{{ priceFormat($orderProduct->price) }}</p>
                    </div>
                    <div class="item-group">
                        <span>Quantity</span>
                        <p>{{ $orderProduct->pivot->quantity }}</p>
                    </div>
                </div>    
            @endforeach

        <div class="order-total">

            <div class="sub-total">
                <span>Order Subtotal</span>
                <p class="sub-total">{{ priceFormat($order->subtotal) }}</p>
            </div>

            <div class="tax">
                <span>Order VAT</span>
                <p class="tax">{{ priceFormat($order->tax) }}</p>
            </div>

            <div class="total">
                <span>Order Total</span>
                <p class="total">{{ priceFormat($order->subtotal) }}</p>
            </div>

        </div>
	</div>

    <a href="{{ route('home.index') }}" class="site-btn">
        Go Back to Homepage
    </a>
</div>
@endsection