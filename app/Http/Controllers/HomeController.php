<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    protected $product;
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * returns the main home view
     * @return View
     */
    public function __invoke(): View
    {
        return view('home.index', [
            'products' => $this->product->paginate(4)
        ]);
    }
}
