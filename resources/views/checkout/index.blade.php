@extends('layouts.main')

@section('title', 'Checkout')

@section('main')
<div class="wrapper">
    
    <div id="messages">
        @include('partials.errors')
        @include('partials.messages')
    </div>
    
    <h3>
        Checkout
    </h3>

    <section class="checkout-page">

        <div class="order-summary">
            <h5>Order Summary</h5>
            @foreach(Cart::content() as $item)
                <div class="cart-item">
                    <div class="item-group">
                        <span>Product</span>
                        <p>{{ ucwords($item->model->name) }}</p>
                    </div>
                    <div class="item-group">
                        <span>Price</span>
                        <p>{{ priceFormat($item->model->price) }}</p>  
                    </div>
                    <div class="item-group">
                        <span>VAT</span>
                        <p>{{ priceFormat(Cart::tax()) }}</p>
                    </div>
                    <div class="item-group">
                        <span>Quantity</span>
                        <p>{{ $item->qty }}</p>
                    </div>
                </div>    
            @endforeach

            <div class="cart-total">
                <span>Total</span>
                <p>{{ priceFormat(Cart::total()) }}</p>
            </div>

            @if(session()->has('coupon'))
                <div class="cart-total">
                    <span>Discounted Total</span>
                    <p>{{ priceFormat($newTotal) }}</p>
                </div>
            @endif

        </div>

        <form id="payment-form" class="checkout-form" action="{{ route('checkout.store') }}" method="POST">
        <div class="payment-details">
                @csrf
                <div class="checkout-form-group">
                    <label for="name">Full Name</label>
                    <input class="checkout-form-control" type="text" id="name" name="name" value="{{ old('name') }}" required>
                </div>
                <div class="checkout-form-group">
                    <label for="email">Email</label>
                    <input class="checkout-form-control" type="email" id="email" name="email" value="{{ auth()->user()->email }}" required>
                </div>

                <div class="checkout-form-group">
                    <label for="address">Address 1</label>
                    <input class="checkout-form-control" type="text" id="address_1" name="address_1" value="{{ old('address_1') }}" required>

                    <label for="address">Address 2</label>
                    <input class="checkout-form-control" type="text" id="address_2" name="address_2" value="{{ old('address_2') }}">
                </div>
                <div class="checkout-form-group">
                    <label for="city">City</label>
                    
                    <input class="checkout-form-control" type="text" id="city" name="city" value="{{ old('city') }}" required>
                </div>

                <div class="checkout-form-group relative">
                    <label for="country">Country</label>
                    <select class="checkout-dropdown" name="country" id="country">
                        @foreach($countries as $country)
                            <option value="{{ $country->country_code }}">{{ $country->country_name }}</option>
                        @endforeach
                    </select>
                    <div class="mt-10 pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <i class="fill-current h-4 w-4 fas fa-chevron-down"></i>
                    </div>
                </div>
                <div class="checkout-form-group">
                    <label for="postalcode">Post Code/ZIP</label>

                    <input class="checkout-form-control" type="text" id="postalcode" name="postalcode" value="{{ old('postalcode') }}" required>
                </div>

                <div class="checkout-form-group">
                    <label for="phone" class="in-name">Phone</label>
                    <input class="checkout-form-control" type="text" id="phone" name="phone" value="{{ old('phone') }}" required>
                </div>
            </div>

            <div class="payment-method">
                <h3>Payment</h3>
                <div class="form-row">
                    <div class="form-group">
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
                <button id="complete-order" class="site-btn w-full" type="submit">
                    Place your order
                </button>
            </div>
        </form>
    </section>
</div>    
@endsection
<script src="https://js.stripe.com/v3/"></script>
<script>
    const stripe = Stripe('{{ config('services.stripe.key') }}');
    const elements = stripe.elements();
</script>
<script src="{{ mix('js/stripe.js') }}" defer></script>

