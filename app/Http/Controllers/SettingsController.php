<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SettingsController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        return view('settings.index');
    }
}
