<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * return shopping-cart view
     * @return View
     */
    public function index(): View
    {
        return view('pages.shopping-cart');
    }

    /**
     * adds item to cart 
     * @param $id
     */
    public function addToCart($id)
    {
        
    }

}
