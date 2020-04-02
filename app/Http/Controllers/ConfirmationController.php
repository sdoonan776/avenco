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
	 * @return View
	 */
	public function __invoke(): View
	{
		$products = $this->model->all();
		return view('checkout.order-confirmation', [
			'products' => $products
		]);
	}
}
