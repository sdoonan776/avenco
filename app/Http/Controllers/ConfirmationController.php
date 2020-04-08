<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Services\OrdersTableService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ConfirmationController extends Controller
{

	protected $orderRepository;

	public function __construct(Order $order)
	{
		$this->order = $order;
	}

	/**
	 * Displays the order confirmation page when order is placed
	 * @return View
	 */
	public function __invoke(): View
	{
		$order = auth()->user()->orders()->with('products')->get()->last();
		
		return view('checkout.order-confirmation', [
			'order' => $order
		]);
	}
}
