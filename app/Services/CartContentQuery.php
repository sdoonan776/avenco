<?php

namespace App\Services;

use Gloudemans\Shoppingcart\Facades\Cart;

class CartContentQuery
{
	/**
	 * Get contents of the cart in json
	 * @return mixed
	 */
 	public function getCartContents()
    {
    	$contents = Cart::content()->map(function ($item) {
        	return $item->model->slug.', '.$item->qty;
    	})->values()->toJson();   

    	return $contents;
    }   
}
