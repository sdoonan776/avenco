<?php

namespace App\Interfaces;

use App\Http\Requests\CheckoutRequest;

interface OrderRepositoryInterface 
{
	/**
	 * Stores the order request 
	 * @param CheckoutRequest $request 
	 * @param ?string $error
	 * @return mixed
	 */
	public function addToOrdersTable(CheckoutRequest $request, ?string $error);
	
	/**
	 * Gets all placed orders
	 */
	public function getOrders();
	
}