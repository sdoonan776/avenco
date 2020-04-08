<?php

namespace App\Services;

use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderProduct;
use Gloudemans\Shoppingcart\Facades\Cart;

class OrdersTableService
{
    protected $coupon;

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
    public function addToOrdersTable($request, ?string $error)
    {
        // insert into orders table
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

        // Insert into order_product table
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
