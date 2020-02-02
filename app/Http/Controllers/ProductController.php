<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * @param $id
     * @return View
 	*/
    public function show($id): View
    {
        $product = DB::table('products')->where('id', $id)->first();
        return view('product.show-product', compact('product'));
    }
}
