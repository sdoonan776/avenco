<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrderController extends Controller
{
	
    /**
     * Displays all orders for the particular user
     * @return View
     */
    public function index(): View
    {

        $orders = auth()->user()->orders->with('products')->get();    

        return view('order.index', [
            'orders' => $orders
        ]);
    }

    /**
     * Displays a single resources
     * @param Request $id
     * @return View
     */
    public function show(Request $id): View
    {
        $order = auth()->user()->orders->findOrFail($id)->first();

        $products = $order->products;

    	return view('order.show', [
            'order' => $order,
            'products' => $products
        ]);
    }
}
