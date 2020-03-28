<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutRequest;
use App\Interfaces\OrderRepositoryInterface;
use App\Mail\OrderPlaced;
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
    protected $couponDiscountService;

    public function __construct(
        OrderRepositoryInterface $orderRepository,
        StripeService $stripeService,
        CouponDiscountService $couponDiscountService
    )
    {
        $this->orderRepository = $orderRepository;
        $this->stripeService = $stripeService;
        $this->couponDiscountService = $couponDiscountService;
    }

	/**
	 * returns checkout view
	 * @return View
	 */
    public function index(): View
	{
		if (Cart::instance('default')->count() == 0) {
            return redirect()->route('shop.index');
        }
		return view('checkout.index');	    
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
            // $charge = Stripe::charges()->create([
            //     'amount' => $this->couponDiscountService->getNewTotal() / 100,
            //     'currency' => 'GBP',
            //     'source' => $request->stripeToken,
            //     'description' => 'Order',
            //     'receipt_email' => $request->email,
            //     'metadata' => [
            //         'contents' => $contents,
            //         'quantity' => Cart::instance('default')->count(),
            //         'discount' => collect(session()->get('coupon'))->toJson(),
            //     ],
            // ]);
            
            $charge = $this->stripeService->;

            $order = $this->orderRepository->addToOrdersTables($request, null);
            Mail::send(new OrderPlaced($order));

            // decrease the quantities of all the products in the cart
            $this->decreaseQuantities();

            Cart::instance('default')->destroy();
            session()->forget('coupon');

            return redirect()->route('confirmation.index')->with('success_message', 'Thank you! Your payment has been successfully accepted!');
        } catch (CardErrorException $e) {
            $this->addToOrdersTables($request, $e->getMessage());
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
