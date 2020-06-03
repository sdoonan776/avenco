<?php

namespace App\Repository;

use App\Models\Order;
use App\Models\Coupon;
use App\Models\OrderProduct;
use App\Http\Requests\CheckoutRequest;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Interfaces\OrderRepositoryInterface;

class OrderRepository implements OrderRepositoryInterface
{
    protected Coupon $coupon;

    public function __construct(Coupon $coupon)
    {
        $this->coupon = $coupon;
    }

        /**
     * Stores the order request 
     * @param CheckoutRequest $request 
     * @param ?string $error
     * @return mixed
     */
    public function insertOrder(CheckoutRequest $request, ?string $error)
    {
    	$order = Order::create([
            'user_id' => auth()->user() ? auth()->user()->id : null,
            'email' => $request->email,
            'name' => $request->name,
            'address_1' => $request->address_1,
            'address_2' => $request->address_2,
            'city' => $request->city,
            'country' => $request->country,
            'postalcode' => $request->postalcode,
            'phone' => $request->phone,
            'name_on_card' => $request->name_on_card,
            'discount' => $this->coupon->getDiscount(),
            'discount_code' => $this->coupon->getCode(),
            'subtotal' => $this->coupon->getNewSubtotal(),
            'tax' => $this->coupon->getNewTax(),
            'total' => $this->coupon->getNewTotal(),
            'error' => $error,
        ]);
        
        foreach (Cart::content() as $item) {
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $item->model->id,
                'quantity' => $item->qty,
            ]);
        }    

        return $order;

    }

}
