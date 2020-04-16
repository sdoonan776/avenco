<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutRequest;
use App\Jobs\DecreaseProductQuantity;
use App\Mail\OrderPlaced;
use App\Models\Country;
use App\Models\Coupon;
use App\Services\CouponDiscountService;
use App\Services\OrdersTableService;
use App\Services\StripeService;
use Cartalyst\Stripe\Exception\CardErrorException;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class CheckoutController extends Controller
{
    protected $ordersTableService;
    protected $stripeService;
    protected $coupon;
    protected $countries;

    public function __construct(
        OrdersTableService $ordersTableService,
        StripeService $stripeService,
        Coupon $coupon, 
        Country $countries
    )
    {
        $this->ordersTableService = $ordersTableService;
        $this->stripeService = $stripeService;
        $this->coupon = $coupon;
        $this->countries = $countries;
    }

	/**
	 * returns checkout view
	 */
    public function index()
	{
		if (Cart::instance('default')->count() == 0) {
            return redirect()->route('shop.index');
        }

        $countries = $this->countries::all();

		return view('checkout.index', [
            'countries' => $countries,
            'discount' => $this->coupon->getDiscount(),
            'newSubTotal' => $this->coupon->getNewSubTotal(),
            'newTax' => $this->coupon->getNewTax(),
            'newTotal' => $this->coupon->getNewTotal(),
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
            $this->stripeService->processPayment($request);

            $order = $this->ordersTableService->addToOrdersTable($request, null);

            Mail::send(new OrderPlaced($order));

            // decrease the quantities of all the products in the cart
            dispatch_now(new DecreaseProductQuantity());

            Cart::instance('default')->destroy();
            session()->forget('coupon');

            return redirect()->route('checkout.order-confirmation')->with('success_message', 'Thank you! Your payment has been successfully accepted!');

        } catch (CardErrorException $e) {
            $this->orderRepository->addToOrdersTables($request, $e->getMessage());
            return back()->withErrors('Error! ' . $e->getMessage());
        }
	}
}
