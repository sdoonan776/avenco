<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminController extends Controller
{
	/**
	 * displays the main admin dashboard
	 * @return View
	 */
    public function index(): View
    {
   		return view('admin.index');
    }

	/**
	 * displays the main admin login
	 * @return View
	 */
	public function login(): View
	{
		return view('admin.login');
	}

}
