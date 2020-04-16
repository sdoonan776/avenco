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
    protected $repository;

	public function __construct(ProductRepositoryInterface $repository)
	{
		$this->repository = $repository;
	}

    /**
     * returns the main home view
     * @return View
     */
    public function __invoke(): View
    {
        $products = $this->repository->productPagination(4);    
        
        return view('home.index', [
            'products' => $products
        ]);
    }
}
