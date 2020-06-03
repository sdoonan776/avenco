<?php

namespace App\Http\Controllers\Site;

use Exception;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use App\Interfaces\ProductRepositoryInterface;

class HomeController extends Controller
{
    protected ProductRepositoryInterface $repository;

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
