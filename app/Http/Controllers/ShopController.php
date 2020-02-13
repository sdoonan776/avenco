<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Models\Product;


class ShopController extends Controller
{
      /**
     * Display all products
     *
     * @return View
     */
    public function index(): View
    {
        $products = DB::table('products')->paginate(8);
        return view('shop.index', compact('products'));
    }

    /**
     * Show single product
     * @param  $slug
     * @return View
     */
    public function show($slug): View
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        return view('shop.show', compact('product'));
    }

}
