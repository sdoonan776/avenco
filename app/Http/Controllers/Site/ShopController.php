<?php

namespace App\Http\Controllers\Site;

use App\Models\Product;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use App\Interfaces\CategoryRepositoryInterface;


class ShopController extends Controller
{

    protected $repo;

    public function __construct(CategoryRepositoryInterface $repo) 
    {
        $this->repo = $repo;
    }
    
    /**
     * Displays all products
     *
     * @return View
     */
    public function index(): View
    {
        return view('shop.index', [
            'categories' => $this->repo->listCategories(),
            'categoryName' => $this->repo->getCategoryName(),
            'products' => $this->repo->getProductsByCategory()
        ]);
    }

    /**
     * Show a single product
     * @param  $slug
     * @return View
     */
    public function show($slug): View
    {
        $product = Product::where('slug', $slug)->first();
        
        return view('shop.show', [
            'product' => $product,
        ]);
    }

}
