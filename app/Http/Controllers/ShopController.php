<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;


class ShopController extends Controller
{
      /**
     * Display all products
     *
     * @return View
     */
    public function index(): View
    {
        $categories = Category::all();

        if (request()->category) {
            $products = Product::with('categories')->whereHas('categories', function ($query) {
                $query->where('slug', request()->category);
            });
            $categoryName = optional($categories->where('slug', request()->category)->first())->name;
        } else {
           $products = DB::table('products')->paginate(8);
           $categoryName =  'All Products';
        }   

        if (request()->sort == 'low_high') {
            $products = $products->orderBy('price')->paginate(8);
        } elseif (request()->sort == 'high_low') {
            $products = $products->orderBy('price', 'desc')->paginate(8);
        } else {
            $products = DB::table('products')->paginate(8);
        }
        
        return view('shop.index')->with([
            'products' => $products,
            'categoryName' => $categoryName,
            'categories' => $categories,
        ]);
    }

    /**
     * Show a single product
     * @param  $slug
     * @return View
     */
    public function show($slug): View
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        return view('shop.show')->with([
            'product' => $product,
        ]);
    }

}
