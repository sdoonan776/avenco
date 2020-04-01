<?php

namespace App\Repository;

use App\Http\Requests\CheckoutRequest;
use App\Interfaces\OrderRepositoryInterface;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Repository\BaseRepository;
use Gloudemans\Shoppingcart\Facades\Cart;

class OrderRepository extends BaseRepository implements OrderRepositoryInterface
{
	protected $model;
    protected $coupon;

	/**
	 * Constructor for OrderRepository
	 * @param Order $model
	 */
	public function __construct(Order $model, Coupon $coupon)
    {
    	parent::__construct($model);
    	$this->model = $model;
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
            'address_1' => $request->address,
            'address_2' => $request->address,
            'city' => $request->city,
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
    
    /**
	 * Gets all placed orders
     * @return mixed
	 */
    public function getOrders()
    {
        return $this->all();    	
    }

    /**
     * Gets a single instance of the order resource
     * @param  int $id
     * @return Order
     */
    public function getSingleOrder(int $id)
    {
        return $this->find($id);
    }
}
