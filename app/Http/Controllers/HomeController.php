<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
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
    	try {
		  $products = DB::table('products')->paginate(9);
    	} catch (\Exception $e) {
		  $e->getMessage();
    	}

        return view('pages.home', compact('products'));
    }
}
