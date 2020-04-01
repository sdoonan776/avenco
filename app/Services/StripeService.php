<?php

namespace App\Services;

use App\Http\Requests\CheckoutRequest;
use App\Models\Coupon;
use App\Services\CartContentService;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Gloudemans\Shoppingcart\Facades\Cart;


class StripeService
{
	protected $coupon;
    
	public function __construct(
    Coupon $coupon,
    CartContentService $cartContentService
  )
	{
		$this->coupon = $coupon;
    $this->cartContentService = $cartContentService;
	}

	/**
	 * Uses the Stripe facade to process the card payment
   * @param CheckoutRequest $request
	 * @return array
	 */
	public function processPayment(CheckoutRequest $request): array
	{
    $contents = $this->cartContentService->getCartContents();

		return Stripe::charges()->create([
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
