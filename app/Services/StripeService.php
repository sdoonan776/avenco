<?php

namespace App\Services;

use Cartalyst\Stripe\Stripe;

class StripeService
{
	protected $stripe;

	public function __construct()
	{
		if (config('services.stripe.key') == '' | config('services.stripe.secret') == '') {
			return redirect()->back()->with('error', 'There are no stripe settings found');
		}		

		$this->stripe = Stripe::make(config('services.stripe.key'));
	}

	/**
	 * Uses the Stripe facade to process the card payment
	 * @return mixed
	 */
	public function processPayment()
	{
		$this->stripe::charges()->create([
                'amount' => $this->couponDiscountService->getNewTotal() / 100,
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

}
