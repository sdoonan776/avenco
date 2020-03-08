<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository extends Product
{

	/**
	 * sort products by price 
	 * @param  Request $request
	 * @return Product
	 */
	public function sort(Request $request): Product
	{
		if (request()->sort == 'low_high') {
	        $products = $products->orderBy('price')->paginate(8);
	    } elseif (request()->sort == 'high_low') {
	        $products = $products->orderBy('price', 'desc')->paginate(8);
	    } else {
	        $products = $products->paginate(8);
	    }
	}
}