<?php

namespace App\Services;

use App\Http\Requests\CheckoutRequest;
use Cartalyst\Stripe\Stripe;

class StripeService
{
	protected $stripe;
    
	public function __construct()
	{
		if (config('services.stripe.key') == '' | config('services.stripe.secret') == '') {
			return redirect()->back()->with('error', 'There are no stripe settings found');
		}		

		$this->stripe = Stripe::make(config('services.stripe.key', config('services.stripe.key')));
	}

	/**
	 * Uses the Stripe facade to process the card payment
   * @param CheckoutRequest $request
	 * @return Stripe
	 */
	public function processPayment(CheckoutRequest $request): Stripe
	{
		return $this->stripe::charges()->create([
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
	}

  /**
   * Returns a validation error for non-unique email
   * @return array
   */
  public function messages(): array
  {
    return [
        'email.unique' => 'You already have an account with this email address. Please <a href="/login">login</a> to continue.',
    ];
  }	
}
