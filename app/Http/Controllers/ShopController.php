<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Services\CategoryFilterService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;


class ShopController extends Controller
{

    protected $category;

    public function __construct(CategoryFilterService $category) {
        $this->category = $category;
    }
      /**
     * Display all products
     *
     * @return View
     */
    public function index(): View
    {
        $categories = Category::all();

        if (request()->category) {
            $products = Product::with('categories')->whereHas('categories', fn($query) =>
                $query->where('slug', request()->category)
            );
            $categoryName = optional($categories->where('slug', request()->category)->first())->name;
        } else {
           $products = DB::table('products')->paginate(8);
           $categoryName =  'All Products';
        }   
        
        $products = $products->paginate(8);
        
        return view('shop.index', [
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
