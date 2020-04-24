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
                <a href="{{ route('shop.show', $item->model->slug) }}">
                    <img src="{{ asset($item->model->product_image) }}" alt="{{ ucwords($item->model->name) }}">
                </a>
                <div class="product-info">
                    <h5>{{ ucwords($item->model->name) }}</h5>
                    <p>{{ priceFormat($item->model->price) }}</p>

                    <select class="quantity" data-id="{{ $item->rowId }}" data-productQuantity="{{ $item->model->quantity }}">
                        @for ($i = 1; $i <= 30; $i++)
                            <option {{ $item->qty == $i ? 'selected' : '' }}>{{ $i }}</option>
                        @endfor
                    </select>
                    
                    <div class="product-actions">
                        <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
                            @csrf
                            @method('DELETE') 
                            <button type="submit">
                                Remove
                            </button>
                        </form>
                        <form action="{{ route('cart.switchToSaveForLater', $item->rowId) }}" method="POST">
                            @csrf
                            <button type="submit">
                                Save for Later
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="cart-options">
        <form class="clear-cart" action="{{ route('cart.clearCart') }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="site-btn" type="submit">
                Clear Cart
            </button>
        </form>
    </div>

    <div class="coupon-section">
        <form class="store-coupon" action="{{ route('coupon.store') }}" method="POST">
            @csrf
            <input class="input-control" name="coupon" type="text" placeholder="Enter Code">
            <button class="coupon-btn" type="submit">
                Submit
            </button>
        </form>
    </div>
    @if(session()->has('coupon')) 
    <div class="coupon-section">
       
       <h5>
           Coupon
       </h5>
          
        <div class="coupon-code">
            <span>Code</span>
            <p>{{ session()->get('coupon')['name'] }}</p>
        </div>

        <div class="coupon-destroy">
            <form action="{{ route('coupon.destroy') }}" method="POST">
                @csrf
                @method('DELETE') 
                <button class="coupon-btn" type="submit">
                    Remove
                </button>
            </form>
        </div> 

    </div>  
    @endif    
    <div class="total-summary">
        <h5>Cart Summary</h5>

        <div class="sub-total">
            <span>Subtotal</span>
            @if(!session()->has('coupon'))
                <p class="sub-total">{{ priceFormat(Cart::subtotal()) }}</p>
            @else
                <p class="sub-total">{{ priceFormat($newSubTotal) }}</p>
            @endif
        </div>

        <div class="tax">
            <span>VAT</span>
            <p class="tax">{{ priceFormat(Cart::tax()) }}</p>
        </div>

        <div class="total">
            <span class="total-cart">Total Cart</span>
            @if(!session()->has('coupon'))
                <p class="total">{{ priceFormat(Cart::total()) }}</p>
            @else 
                <p class="total">{{ priceFormat($newTotal) }}</p>
            @endif    
        </div>

    </div>
    <a class="site-btn" href="{{ route('checkout.index') }}">
        Proceed to checkout
    </a>
    @else
        <div class="empty-cart py-5">
            <p>
                There are no items currently in your cart. 
            </p> 
            <a class="site-btn" href="{{ route('shop.index') }}">
                Go Back to Shop
            </a>
        </div>
    @endif
    @if(Cart::instance('saveForLater')->count() > 0)

        <h3>{{ Cart::instance('saveForLater')->count() }} item(s) saved for later</h3>

        <div class="saved-for-later">
            @foreach (Cart::instance('saveForLater')->content() as $item)
                    <div class="saved-for-later-details">
                        <a href="{{ route('shop.show', $item->model->slug) }}">
                            <img src="{{ asset($item->model->product_image) }}" alt="{{ $item->model->name }}">
                        </a>
                        <a href="{{ route('shop.show', $item->model->slug) }}">
                            {{ ucwords($item->model->name) }}
                        </a>
                        <p>{{ priceFormat($item->model->price) }}</p>
                    </div>
                    <div class="">
                        <div class="saved-for-later-actions">
                            <form action="{{ route('saveForLater.destroy', $item->rowId) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button type="submit">
                                    Remove
                                </button>
                            </form>

                            <form action="{{ route('saveForLater.switchToCart', $item->rowId) }}" method="POST">
                                @csrf

                                <button type="submit">
                                    Move to Cart
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
        </div>
    @else 
        <div class="no-items-saved">

            <h3>You have no items saved for later</h3>
        </div>
    @endif 
</div>
@endsection
