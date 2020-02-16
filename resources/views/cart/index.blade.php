@extends('layouts.main')

@section('title', 'Cart')

@section('main')
	 <section class="page-add cart-page-add">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="page-breadcrumb">
                        <h2>Cart</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="cart-page">
        <div class="container">
            <div class="cart-table">
                <table>
                    @if(Cart::count() > 0)
                    <thead>
                        <tr>
                            <th class="product-h">Product</th>
                            <th>Price</th>
                            <th class="quan">Quantity</th>
                            <th>Total</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(Cart::content() as $item)
                            <tr>
                                <td class="product-col">
                                    <img src="img/product/product-1.jpg" alt="">
                                    <div class="p-title">
                                        <h5>{{ $item->name }}</h5>
                                    </div>
                                </td>
                                <td class="price-col">{{ priceFormat($item->price) }}</td>
                                <td class="quantity-col">
                                    <div class="pro-qty">
                                        <input type="text" value="1">
                                    </div>
                                </td>
                                <td class="total">{{ priceFormat($item->price) }}</td>
                                <td class="product-close">
                                    x
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="cart-btn">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="coupon-input">
                            <input type="text" placeholder="Enter cupone code">
                        </div>
                    </div>
                    <div class="col-lg-5 offset-lg-1 text-left text-lg-right">
                        <div class="site-btn clear-btn">Clear Cart</div>
                        <div class="site-btn update-btn">Update Cart</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="shopping-method">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="shipping-info">
                            <h5>Choose a shipping</h5>
                            <div class="chose-shipping">
                                <div class="cs-item">
                                    <input type="radio" name="cs" id="one">
                                    <label for="one">
                                        Free Standard shhipping
                                        <span>Estimate for New York</span>
                                    </label>
                                </div>
                                <div class="cs-item">
                                    <input type="radio" name="cs" id="two">
                                    <label for="two">
                                        Next Day delievery $10
                                    </label>
                                </div>
                                <div class="cs-item last">
                                    <input type="radio" name="cs" id="three">
                                    <label for="three">
                                        In Store Pickup - Free
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="total-info">
                            <div class="total-table">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Total</th>
                                            <th>Subtotal</th>
                                            <th>Shipping</th>
                                            <th class="total-cart">Total Cart</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @else
                                            <div>
                                                <p>
                                                    There are no items currently in your cart. <a href="{{ route('shop.index') }}">
                                                        Go Back to Shop
                                                    </a>
                                                </p> 
                                            </div>
                                        @endif
                                        <tr>
                                            <td class="total"></td>
                                            <td class="sub-total"></td>
                                            <td class="shipping"></td>
                                            <td class="total-cart-p"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 text-right">
                                    <a href="{{ route('cart.checkout') }}" class="primary-btn chechout-btn">Proceed to checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection