<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Interfaces\ProductRepositoryInterface;
use App\Models\Category;
use App\Models\Product;
use Http\Client\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class HomeController extends Controller
{
    protected $productRepository;

	public function __construct(ProductRepositoryInterface $productRepository)
	{
		$this->productRepository = $productRepository;
        // $this->middleware(['auth','verified']);
	}

    /**
     * returns the main home view
     * @return View
     */
    public function __invoke(): View
    {
      $products = $this->productRepository->productPagination(4);    
      return view('home.index', compact('products'));
    }
}
