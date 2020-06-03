<?php

namespace App\Services;

use App\Models\Coupon;
use App\Services\CartContentQuery;
use App\Http\Requests\CheckoutRequest;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Interfaces\PaymentServiceInterface;
use Cartalyst\Stripe\Laravel\Facades\Stripe;

class StripeService implements PaymentServiceInterface
{
  protected Coupon $coupon;
  protected CartContentQuery $query;
    
	public function __construct(
    Coupon $coupon,
    CartContentQuery $query
  )
	{
		$this->coupon = $coupon;
    $this->query = $query;
	}

	/**
	 * Uses the Stripe facade to process the card payment
   * @param CheckoutRequest $request
	 * @return mixed
	 */
	public function processPayment($request)
	{
    if (isset($request->stripeToken) && !empty($request->stripeToken)) {
      
      $contents = $this->query->getCartContents();

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
