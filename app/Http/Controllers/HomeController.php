<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    protected $products;

    public function __construct(Product $products)
    {
        $this->products = $products;
    }

    /**
     * returns the main home view
     * @return View
     */
    public function __invoke(): View
    {
        return view('home.index', [
            'products' => $this->products->paginate(4)
        ]);
    }
}
