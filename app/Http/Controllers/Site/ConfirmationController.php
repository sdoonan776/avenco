<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ConfirmationController extends Controller
{

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
