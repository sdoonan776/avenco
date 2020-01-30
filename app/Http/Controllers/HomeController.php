<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * returns the main home view
     * @return View
     */
    public function index(): View
    {
        return view('pages.home');
    }
}
