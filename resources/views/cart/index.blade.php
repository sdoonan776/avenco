@extends('layouts.main')

@section('title', 'Cart')

@section('main')
    <div class="container">
        @if (session()->has('success_message'))
            <div class="m-t alert alert-success">
                {{ session()->get('success_message') }}
            </div>
        @endif

        @if(count($errors) > 0)
            <div class="m-t alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
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
                                    <img src="{{ asset($item->model->product_image) }}" alt="">
                                    <div class="p-title">
                                        <h5>{{ ucwords($item->model->name) }}</h5>
                                    </div>
                                </td>
                                <td class="price-col">{{ price_format($item->model->price) }}</td>
                                <td class="quantity-col">
                                    <div class="pro-qty">
                                        <input type="text" value="1">
                                    </div>
                                </td>
                                <td class="total">{{ price_format($item->model->price) }}</td>
                                <td class="product-close">
                                    <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit">
                                            x
                                        </button>
                                    </form>
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
                            <input type="text" placeholder="Enter coupon code">
                        </div>
                    </div>
                    <div class="col-lg-5 offset-lg-1 text-left text-lg-right">
                        <div class="site-btn update-btn">
                            <form action="{{ route('cart.update', $item->rowId) }}" method="POST">
                                @csrf
                                {{ method_field('PATCH') }}
                                <button type="submit">
                                    Update Cart
                                </button>
                            </form>
                        </div>
                        <div class="site-btn clear-btn">
                            <a href="#">
                                Clear Cart
                            </a> 
                        </div>
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
                                <div class="shipping-select">
                                    <input class="shipping-input" type="radio" name="cs" id="one" required>
                                    <label for="one">
                                        Free Standard shipping
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
                                            <th>Tax</th>
                                            <th class="total-cart">Total Cart</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="total">{{ price_format(Cart::total()) }}</td>
                                            <td class="sub-total">{{ price_format(Cart::subtotal()) }}</td>
                                            <td class="tax">{{ price_format(Cart::tax()) }}</td>
                                            <td class="total-cart-p">{{ price_format(Cart::total()) }}</td>
                                        </tr>
                                        @else
                                            <div>
                                                <p>
                                                    There are no items currently in your cart. 
                                                </p> 
                                                <a class="btn btn-secondary" href="{{ route('shop.index') }}">
                                                    Go Back to Shop
                                                </a>
                                            </div>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 text-right">
                                    <a href="{{ route('checkout.index') }}" class="primary-btn chechout-btn">Proceed to checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection