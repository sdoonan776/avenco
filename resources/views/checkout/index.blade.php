@extends('layouts.main')

@section('title', 'Checkout')

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
 <section class="cart-total-page spad">
        <div class="container">
            <form id="payment-form" class="checkout-form" action="{{ route('checkout.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <h3>Your Information</h3>
                    </div>
                    <div class="col-lg-9">
                        <div class="row form-group">
                            <div class="col-lg-2">
                                <label for="name" class="in-name">Full Name</label>
                            </div>
                            <div class="col-lg-10">
                                <input type="text" name="name" value="{{ old('billing_name') }}">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-lg-2">
                                <label for="email" class="in-name">Email</label>
                            </div>
                            <div class="col-lg-10">
                                <input type="email" name="email" value="{{ auth()->user()->email }}">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-lg-2">
                                <label for="address" class="in-name">Address</label>
                            </div>
                            <div class="col-lg-10">
                                <input class="form-control" type="text" name="address_1" value="{{ old('address_1') }}">
                                <input class="form-control" type="text" name="address_2" value="{{ old('address_2') }}">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-lg-2">
                                <p class="in-name">Country</p>
                            </div>
                            <div class="col-lg-10">
                                <select class="cart-select">
                                   <option value="select">select</option>
                                   <option value="United Kingdom">United Kingdom</option>
                                   <option value="USA">USA</option>
                                   <option value="France">France</option>
                                   <option value="Italy">Italy</option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-lg-2">
                                <label for="city" class="in-name">City</label>
                            </div>
                            <div class="col-lg-10">
                                <input class="form-control" type="text" name="city" value="{{ old('city') }}">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-lg-2">
                                <label for="postalcode" class="in-name">Post Code/ZIP</label>
                            </div>
                            <div class="col-lg-10">
                                <input class="form-control" type="text" name="postalcode" value="{{ old('billing_postalcode') }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2">
                                <label for="phone" class="in-name">Phone</label>
                            </div>
                            <div class="col-lg-10">
                                <input class="form-control" type="text" name="phone" value="{{ old('billing_phone') }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="order-table">
                            @foreach(Cart::content() as $item)
                            <div class="cart-item">
                                <span>Product</span>
                                <p class="product-name">{{ ucwords($item->model->name) }}</p>
                            </div>
                            <div class="cart-item">
                                <span>Price</span>
                                <p>{{ priceFormat($item->model->price) }}</p>
                            </div>
                            <div class="cart-item">
                                <span>Quantity</span>
                                <p>{{ $item->qty }}</p>
                            </div>
                            @endforeach

                            <div class="cart-total">
                                <span>Total</span>
                                <p>{{ priceFormat(Cart::total()) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="payment-method">
                            <h3>Payment</h3>
                            <div class="col-lg-4 form-group">
                                <label for="card-element">Credit / Debit card</label>
                                <img src="{{ asset('resources/assets/img/mastercard.jpg') }}" alt="credit card">
                                <div id="card-element">
                                    {{-- stripe element will be inserted here --}}
                                </div>
                            </div>
                            <button id="complete-order" type="submit">Place your order</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
