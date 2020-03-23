<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Http\Client\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class HomeController extends Controller
{
    
    /**
     * returns the main home view
     * @return View
     */
    public function index(): View
    {
	    $products = DB::table('products')->paginate(4);    
      return view('pages.home', compact('products'));
    }
}
