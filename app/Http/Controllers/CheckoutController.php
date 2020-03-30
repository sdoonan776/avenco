<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutRequest;
use App\Interfaces\OrderRepositoryInterface;
use App\Mail\OrderPlaced;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Services\CouponDiscountService;
use App\Services\StripeService;
use Cartalyst\Stripe\Exception\CardErrorException;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class CheckoutController extends Controller
{
    protected $orderRepository;
    protected $stripeService;
    protected $coupon;

    public function __construct(
        OrderRepositoryInterface $orderRepository,
        StripeService $stripeService,
        Coupon $coupon
    )
    {
        $this->orderRepository = $orderRepository;
        $this->stripeService = $stripeService;
        $this->coupon = $coupon;
    }

	/**
	 * returns checkout view
	 */
    public function index()
	{
		if (Cart::instance('default')->count() == 0) {
            return redirect()->route('shop.index');
        }

		return view('checkout.index', [
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
	public function store(CheckoutRequest $request): mixed
	{
 		$contents = Cart::content()->map(function ($item) {
        	return $item->model->slug.', '.$item->qty;
    	})->values()->toJson();

    	try {
            $charge = $this->stripeService->processPayment($request);

            $order = $this->orderRepository->addToOrdersTables($request, null);
            Mail::send(new OrderPlaced($order));

            // decrease the quantities of all the products in the cart
            $this->decreaseQuantities();

            Cart::instance('default')->destroy();
            session()->forget('coupon');

            return redirect()->route('checkout.order-confirmation')->with('success_message', 'Thank you! Your payment has been successfully accepted!');
        } catch (CardErrorException $e) {
            $this->orderRepository->addToOrdersTables($request, $e->getMessage());
            return back()->withErrors('Error! ' . $e->getMessage());
        }
	}

    /**
     * Decrease the quantity of the main checkout resource
     * @return void
     */
	protected function decreaseQuantities(): void
    {
        foreach (Cart::content() as $item) {
            $product = Product::find($item->model->id);

            $product->update(['quantity' => $product->quantity - $item->qty]);
        }
    }

    /**
     * Displays the order confirmation page
     * @return View
     */
    public function confirmation(): View
    {
        return view('checkout.order-confirmation');
    }

}
