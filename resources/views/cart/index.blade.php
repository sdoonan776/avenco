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
                        <span>{{ Cart::count() }} item(s) in Shopping Cart</span>
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
                                <td class="price-col">{{ priceFormat($item->model->price) }}</td>
                                <td class="quantity-col">
                                    <div class="pro-qty">
                                        <input class="quantity" data-id="{{ $item->rowId }}"
                                        data-productQuantity="{{ $item->model->quantity }}" type="text" value="{{ $item->qty }}">
                                    </div>
                                </td>
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
                        <form action="{{ route('coupon.store') }}" method="POST">
                            @csrf
                            <div class="coupon-input input-group">
                                <input class="input-group-prepend" name="coupon" type="text" placeholder="Enter coupon code">
                                <input class="btn btn-secondary" type="submit" value="Submit">
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-5 offset-lg-1 text-left text-lg-right">
                        <div class="site-btn clear-btn">
                            <form action="{{ route('cart.clearCart') }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">
                                    Clear Cart
                                </button> 
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if(session()->has('coupon')) 
            <div class="row">
              <div class="coupon-section">
                  <p>Code</p>
                  <p>{{ session()->get('coupon')['name'] }}</p>

                <form action="{{ route('coupon.destroy') }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('delete') }}
                    <button type="submit" style="font-size:14px;">
                        Remove
                    </button>
                </form>
              </div>
            </div>
        @endif    
        <div class="shopping-method">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="total-info">
                            <div class="total-table">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Subtotal</th>
                                            <th>VAT</th>
                                            <th class="total-cart">Total Cart</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="sub-total">{{ priceFormat(Cart::subtotal()) }}</td>
                                            @if(session()->has('coupon'))
                                                - {{ priceFormat($discount) }}
                                                {{ priceFormat($newSubtotal) }}
                                            @endif 
                                            
                                            <td class="tax">{{ priceFormat(Cart::tax()) }}</td>
                                            <td class="total-cart-p">{{ priceFormat(Cart::total()) }}</td>
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