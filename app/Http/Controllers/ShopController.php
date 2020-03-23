<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Interfaces\CategoryRepositoryInterface;
use App\Interfaces\ProductRepositoryInterface;
use App\Models\Category;
use App\Models\Product;
use App\Repository\CategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;


class ShopController extends Controller
{

    protected CategoryRepositoryInterface $categoryRepository;
    protected ProductRepositoryInterface $productRepository;

    public function __construct(
        CategoryRepositoryInterface $categoryRepository,
        ProductRepositoryInterface $productRepository
    ) {
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
    }
    
      /**
     * Display all products
     *
     * @return View
     */
    public function index(): View
    {
        // $categories = $this->categories->all();
        // $products = $this->categories->filterProductsByCategory();
        // $categoryName = $this->categories->filterProductsByCategory();
        // $categoryName = $this->categories->getCategoryName();

        $category = Category::all();

        if (request()->category) {
            $products = Product::with('categories')->whereHas('categories', fn($query) =>
                $query->where('slug', request()->slug)
            );
            $categoryName = optional($categories->where('slug', request()->category)->first())->name;
        } else {
           $products = DB::table('products')->paginate(8);
           $categoryName =  'All Products';
        }   
        
        $products = $products->paginate(8);
      
        return view('shop.index', [
            'categories' => $categories,
            'products' => $products,
            'categoryName' => $categoryName,
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
