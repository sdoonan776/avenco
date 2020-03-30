<?php

namespace App\Repository;

use App\Http\Requests\CheckoutRequest;
use App\Interfaces\OrderRepositoryInterface;
use App\Models\Order;
use App\Repository\BaseRepository;

class OrderRepository extends BaseRepository implements OrderRepositoryInterface
{
	protected $model;

	/**
	 * Constructor for OrderRepository
	 * @param Order $model
	 */
	public function __construct(Order $model)
    {
    	parent::__construct($model);
    	$this->model = $model;
    }    

    /**
     * Stores the order request 
     * @param CheckoutRequest $request 
     * @param string $error
     * @return mixed
     */
    public function addToOrdersTable(CheckoutRequest $request, string $error)
    {
        // insert into orders table
    	$order = Order::create([
            'user_id' => auth()->user() ? auth()->user()->id : null,
            'email' => $request->email,
            'name' => $request->name,
            'address' => $request->address,
            'city' => $request->city,
            'postalcode' => $request->postalcode,
            'phone' => $request->phone,
            'name_on_card' => $request->name_on_card,
            'discount' => getNumbers()->get('discount'),
            'discount_code' => getNumbers()->get('code'),
            'subtotal' => getNumbers()->get('newSubtotal'),
            'tax' => getNumbers()->get('newTax'),
            'total' => getNumbers()->get('newTotal'),
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
