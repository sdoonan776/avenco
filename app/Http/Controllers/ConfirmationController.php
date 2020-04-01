<?php

namespace App\Http\Controllers;

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
		return view('checkout.order-confirmation');
	}
}
