<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PagesController extends Controller
{

	/**
	 * return about view
	 * @return View
	 */
    public function about(): View
    {
    	return view('pages.about');
    }

    /**
     * return contact view
     * @return View
     */
    public function contact(): View
    {
        return view('pages.contact');
    }

    /**
     * return checkout view
     * @return View
     */
    public function checkout(): View
    {
        return view('pages.checkout');
    }
}
