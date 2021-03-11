<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutRequest;
use App\Interfaces\OrderRepositoryInterface;
use App\Interfaces\PaymentServiceInterface;
use App\Jobs\DecreaseProductQuantity;
use App\Mail\OrderPlaced;
use App\Models\Country;
use App\Models\Coupon;
use Cartalyst\Stripe\Exception\CardErrorException;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class CheckoutController extends Controller
{
    protected OrderRepositoryInterface $repo;
    protected PaymentServiceInterface $service;
    protected Coupon $coupon;
    protected Country $countries;

    public function __construct(
        OrderRepositoryInterface $repo,
        PaymentServiceInterface $service,
        Coupon $coupon, 
        Country $countries
    )
    {
        $this->repo = $repo;
        $this->service = $service;
        $this->coupon = $coupon;
        $this->countries = $countries;
    }

	/**
	 * Returns checkout view
     * @return View
	 */
    public function index(): View
	{

		if (Cart::instance('default')->count() == 0) {
            return redirect()->route('shop.index');
        }

		return view('checkout.index', [
            'countries' => $this->countries::all(),
            'discount' => $this->coupon->stats()->getDiscount(),
            'newSubTotal' => $this->coupon->stats()->getNewSubTotal(),
            'newTax' => $this->coupon->stats()->getNewTax(),
            'newTotal' => $this->coupon->stats()->getNewTotal(),
        ]);	    
	}

	/**
	 * checks out items and places order. Redirects to order 
	 * placement page
	 * @param  CheckoutRequest $request 
	 * @return mixed
	 */
	public function store(CheckoutRequest $request)
	{
    	try {
            $this->service->processPayment($request);
            $order = $this->repo->insertOrder($request, null);

            Mail::send(new OrderPlaced($order));
            dispatch_now(new DecreaseProductQuantity());

            Cart::instance('default')->destroy();
            session()->forget('coupon');

            return redirect()->route('checkout.order-confirmation')->with('success_message', 'Thank you! Your payment has been successfully accepted!');

        } catch (CardErrorException $e) {
            $this->orderRepository->insertOrder($request, $e->getMessage());
            return back()->withErrors('Error! ' . $e->getMessage());
        }
	}
}
