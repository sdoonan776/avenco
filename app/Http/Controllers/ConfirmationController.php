<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ConfirmationController extends Controller
{

	protected $model;

	public function __construct(OrderProduct $model)
	{
		$this->model = $model;
	}

	/**
	 * Displays the order confirmation page when order is placed
	 * @param  $id
	 * @return View
	 */
	public function __invoke(): View
	{
		// $orderProduct = $this->model->();

		return view('checkout.order-confirmation', [
			// 'orderProduct' => $orderProduct
		]);
	}
}
