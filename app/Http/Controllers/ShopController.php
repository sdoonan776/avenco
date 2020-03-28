<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Interfaces\CategoryRepositoryInterface;
use App\Interfaces\ProductRepositoryInterface;
use App\Models\Category;
use App\Models\Product;
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
     * Displays all products
     *
     * @return View
     */
    public function index(): View
    {

        $categories = $this->categoryRepository->listCategories();
        $categoryName = $this->categoryRepository->getCategoryName();
        $products = $this->productRepository->productPagination(8);
      
        return view('shop.index', [
            'categories' => $categories,
            'categoryName' => $categoryName,
            'products' => $products,
        ]);
    }

    /**
     * Show a single product
     * @param  $slug
     * @return View
     */
    public function show($slug): View
    {
        $product = $this->productRepository->findProductBySlug($slug);

        return view('shop.show', [
            'product' => $product,
        ]);
    }

}
