@extends('layouts.main')

@section('title', 'Checkout')

@section('main')
 <section class="cart-total-page spad">
        <div class="container">
            <form class="checkout-form" action="{{ route('checkout.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <h3>Your Information</h3>
                    </div>
                    <div class="col-lg-9">
                        <div class="row">
                            <div class="col-lg-2">
                                <label for="billing_name" class="in-name">Full Name</label>
                            </div>
                            <div class="col-lg-10">
                                <input type="text" name="billing_name" value="{{ old('billing_name') }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2">
                                <label for="billing_email" class="in-name">Email</label>
                            </div>
                            <div class="col-lg-10">
                                <input type="email" name="billing_email" value="{{ old('billing_email') }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2">
                                <label for="billing_address" class="in-name">Address</label>
                            </div>
                            <div class="col-lg-10">
                                <input type="text" name="billing_address" value="{{ old('billing_address') }}">
                                <input type="text" name="billing_address" value="{{ old('billing_address') }}">
                            </div>
                        </div>
                        <div class="row">
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
                        <div class="row">
                            <div class="col-lg-2">
                                <label for="billing_city" class="in-name">City</label>
                            </div>
                            <div class="col-lg-10">
                                <input type="text" name="billing_city" value="{{ old('city') }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2">
                                <label for="" class="in-name">Post Code/ZIP</label>
                            </div>
                            <div class="col-lg-10">
                                <input type="text" name="billing_postalcode" value="{{ old('billing_postalcode') }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2">
                                <label for="billing_phone" class="in-name">Phone</label>
                            </div>
                            <div class="col-lg-10">
                                <input type="text" name="billing_phone" value="{{ old('billing_phone') }}">
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
                                <p>{{ price_format($item->model->price) }}</p>
                            </div>
                            <div class="cart-item">
                                <span>Quantity</span>
                                <p>{{ $item->qty }}</p>
                            </div>
                            @endforeach

                            <div class="cart-total">
                                <span>Total</span>
                                <p>{{ price_format(Cart::total()) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="payment-method">
                            <h3>Payment</h3>
                            <ul>
                                {{-- <li>
                                    Paypal 
                                    <img src="{{ asset('resources/assets/img/paypal.jpg') }}" alt="paypal">
                                </li> --}}
                                <li class="col-lg-4">
                                    Credit / Debit card 
                                    <img src="{{ asset('resources/assets/img/mastercard.jpg') }}" alt="credit card">
                                    <div class="form-group">
                                        <input class="form-control" type="tel" name="billing_card_number" placeholder="Card Number">
                                        <input class="form-control" type="" name="billing_expiry_date" placeholder="Expiry Date">
                                        <input class="form-control" type="" name="billing_name_on_card" placeholder="Name on Card">
                                        <input class="form-control" type="" name="cvv" placeholder="CVV">
                                    </div>
                                </li>
                            </ul>
                            <button type="submit">Place your order</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection