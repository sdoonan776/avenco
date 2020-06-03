<?php

namespace App\Services;

use App\Http\Requests\CheckoutRequest;
use App\Models\Coupon;
use App\Services\CartContentService;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Gloudemans\Shoppingcart\Facades\Cart;


class StripeService
{
  protected Coupon $coupon;
  protected CartContentService $service;
    
	public function __construct(
    Coupon $coupon,
    CartContentService $service
  )
	{
		$this->coupon = $coupon;
    $this->service = $service;
	}

	/**
	 * Uses the Stripe facade to process the card payment
   * @param CheckoutRequest $request
	 * @return mixed
	 */
	public function processPayment(CheckoutRequest $request)
	{

    if (isset($request->stripeToken) && !empty($request->stripeToken)) {
      $contents = $this->service->getCartContents();

      $stripe = Stripe::charges()->create([
          'amount' => $this->coupon->getNewTotal() / 100,
          'currency' => 'GBP',
          'source' => $request->stripeToken,
          'description' => 'Order',
          'receipt_email' => $request->email,
          'metadata' => [
              'contents' => $contents,
              'quantity' => Cart::instance('default')->count(),
              'discount' => collect(session()->get('coupon'))->toJson(),
          ],
      ]);
    } else {
      return back()->withErrors('Error', 'Please enter a valid credit card number and name');
    }
    return $stripe;
	}	
}
