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
                        <h3>Checkout</h3>
                    </div>
                    <div class="col-lg-9">
                        <div class="row form-group">
                            <div class="col-lg-2">
                                <label for="name" class="in-name">Full Name</label>
                            </div>
                            <div class="col-lg-10">
                                <input class="form-control" type="text" id="name" name="name" value="{{ old('name') }}" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-lg-2">
                                <label for="email" class="in-name">Email</label>
                            </div>
                            <div class="col-lg-10">
                                <input class="form-control" type="email" id="email" name="email" value="{{ auth()->user()->email }}" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-lg-2">
                                <label for="address" class="in-name">Address</label>
                            </div>
                            <div class="col-lg-10">
                                <input class="form-control" type="text" id="address_1" name="address_1" value="{{ old('address_1') }}" required>
                                <input class="form-control" type="text" id="address_2" name="address_2" value="{{ old('address_2') }}">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-lg-2">
                                <label for="city" class="in-name">City</label>
                            </div>
                            <div class="col-lg-10">
                                <input class="form-control" type="text" id="city" name="city" value="{{ old('city') }}" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-lg-2">
                                <label for="country" class="in-name">Country</label>
                            </div>
                            <div class="col-lg-10">
                                <select class="form-control" name="country" id="country">
                                    @foreach($countries as $country)
                                        <option value="{{ $country->country_code }}">{{ $country->country_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-lg-2">
                                <label for="postalcode" class="in-name">Post Code/ZIP</label>
                            </div>
                            <div class="col-lg-10">
                                <input class="form-control" type="text" id="postalcode" name="postalcode" value="{{ old('postalcode') }}" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2">
                                <label for="phone" class="in-name">Phone</label>
                            </div>
                            <div class="col-lg-10">
                                <input class="form-control" type="text" id="phone" name="phone" value="{{ old('phone') }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="order-table border">
                            @foreach(Cart::content() as $item)
                                <div class="cart-items">
                                    <span>Order Summary</span>
                                    <div class="cart-item">
                                        <span>Product</span>
                                        <p class="product-name">{{ ucwords($item->model->name) }}</p>
                                    </div>
                                    <div class="cart-item">
                                        <span>Price</span>
                                        <p>{{ priceFormat($item->model->price) }}</p>
                                    </div>
                                    <div class="cart-item">
                                        <span>VAT</span>
                                        <p>{{ priceFormat(Cart::tax()) }}</p>
                                    </div>
                                    <div class="cart-item">
                                        <span>Quantity</span>
                                        <p>{{ $item->qty }}</p>
                                    </div>
                                </div>    
                            @endforeach

                            <div class="cart-total">
                                <span>Total</span>
                                @if(session()->has('coupon'))
                                    <p>{{ priceFormat($newTotal) }}</p>
                                @else 
                                    <p>{{ priceFormat(Cart::total()) }}</p>
                                @endif    
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="payment-method">
                            <h3>Payment</h3>
                            <div class="form-row">
                                <div class="form-group col-lg-4 mx-8">
                                    <label class="py-2" for="card-element">Credit / Debit card</label>
                                    <div class="payment-icons">
                                        <img class="py-2" src="{{ asset('resources/assets/img/mastercard.svg') }}" alt="mastercard">
                                        <img class="py-2" src="{{ asset('resources/assets/img/visa.svg') }}" alt="visa">
                                        <img class="py-2" src="{{ asset('resources/assets/img/american-express.svg') }}" alt="american express">
                                    </div>

                                    <div class="p-2 border" id="card-element">
                                         {{-- stripe element will be inserted here --}}
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control p-2 border" id="name_on_card" name="name_on_card" placeholder="Name on Card">
                                    </div>
                                     <div class="py-2 alert" id="card-errors" role="alert">
                                         {{-- stripe card errors will go here --}}
                                     </div>
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
<script src="https://js.stripe.com/v3/"></script>
<script>
    const stripe = Stripe('{{ config('services.stripe.key') }}');
    const elements = stripe.elements();
</script>
<script src="{{ mix('js/stripe.js') }}" defer></script>

