@extends('layouts.main')

@section('title', 'Order Confirmed')

@section('main')
<div class="wrapper">
	<div class="order-message">
		<i class="far fa-check-circle fa-5x"></i>	
		<span>Your order has been successfully placed</span>
		<span>Your Order number is 1002342</span>
	</div>
	<div class="order-details">
		<h5>Order Summary</h5>
            {{-- @foreach($orderProducts as $product)
                <div class="order-item">
                    <div class="item-group">
                        <span>Product</span>
                        <p>{{ $product->order()->name }}</p>
                    </div>
                    <div class="item-group">
                        <span>Price</span>
                        <p>{{ priceFormat($product->order()->price) }}</p>
                    </div>
                    <div class="item-group">
                        <span>Quantity</span>
                        <p>{{ $product->order()->quantity }}</p>
                    </div>
                </div>    
            @endforeach --}}

            <div class="order-total">
                <span>Total</span>
                <p></p>
            </div>
	</div>
</div>
@endsection