<?php

namespace App\Http\Controllers\Resources;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int $id
     */
    public function __invoke($id)
    {
        return view('product.show-product', ['product' => Product::findOrFail($id)]);
    }
}
