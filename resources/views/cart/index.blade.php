@extends('layouts.main')

@section('title', 'Cart')

@section('main')
<div class="wrapper">
    
    <div id="messages">
        @include('partials.errors')
        @include('partials.messages')
    </div>
	
    <div class="breadcrumbs my-4">
        <h2>Cart</h2>
        <span>{{ Cart::count() }} item(s) in Shopping Cart</span>
    </div>

    <div class="cart-page">
        @if(Cart::count() > 0)
        @foreach(Cart::content() as $item)
            <div class="product">
                <img src="{{ asset($item->model->product_image) }}" alt="{{ ucwords($item->model->name) }}">
                <div class="product-info">
                    <h5>{{ ucwords($item->model->name) }}</h5>
                    <p>{{ priceFormat($item->model->price) }}</p>
                    <input class="quantity" data-id="{{ $item->rowId }}"
                    data-productQuantity="{{ $item->model->quantity }}" type="number" value="{{ $item->qty }}">
                    <div class="product-remove">
                        <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
                            @csrf
                            @method('DELETE') 
                            <button class="cart-btn" type="submit">
                                x
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="coupon-section">
        <form class="store-coupon" action="{{ route('coupon.store') }}" method="POST">
            @csrf
            <input class="input-control" name="coupon" type="text" placeholder="Enter Code">
            <button class="coupon-btn" type="submit">
                Submit
            </button>
        </form>
        <form class="clear-cart" action="{{ route('cart.clearCart') }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="site-btn" type="submit">
                Clear Cart
            </button>
        </form>
        <form class="save-for-later" action="{{ route('cart.switchToSaveForLater', $item->rowId) }}">
            @csrf
            <button class="site-btn" type="submit">
                Save for Later
            </button>
        </form>
    </div>
    @if(session()->has('coupon')) 
      <div class="coupon">
          <p>Code</p>
          <p>{{ session()->get('coupon')['name'] }}</p>

        <form action="{{ route('coupon.destroy') }}" method="POST">
            @csrf
            @method('DELETE') 
            <button class="cart-btn" type="submit">
                x
            </button>
        </form>
      </div>            
    @endif    
    <div class="total-summary">

        <div class="sub-total">
            <span>Subtotal</span>
            <p class="sub-total">{{ priceFormat(Cart::subtotal()) }}</p>
        </div>

        <div class="tax">
            <span>VAT</span>
            <p class="tax">{{ priceFormat(Cart::tax()) }}</p>
        </div>

        <div class="total">
            <span class="total-cart">Total Cart</span>
            <p class="total-cart-p">{{ priceFormat(Cart::total()) }}</p>
        </div>

    </div>
    <a class="site-btn" href="{{ route('checkout.index') }}">
        Proceed to checkout
    </a>
    @else
        <div class="empty-cart">
            <p>
                There are no items currently in your cart. 
            </p> 
            <a class="site-btn" href="{{ route('shop.index') }}">
                Go Back to Shop
            </a>
        </div>
    @endif
</div>
@endsection