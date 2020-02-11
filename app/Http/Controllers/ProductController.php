<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $products = DB::table('products')->paginate(8);
        return view('product.index', compact('products'));
    }

    public function show($id): View
    {
        $product = Product::findOrFail($id);
        return view('product.show-product', compact('product'));
    }
}
