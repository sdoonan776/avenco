<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrderController extends Controller
{
	protected $user;

	public function __construct(User $user)
	{
		$this->user = $user;
	}

    /**
     * Displays all orders for the particular user
     * @return View
     */
    public function index(): View
    {
    	$orders = $this->user->orders()->all();
        return view('order.index', [
            'orders' => $orders
        ]);
    }

    /**
     * Displays a single resources
     * @param  int $id
     * @return View
     */
    public function show(int $id): View
    {
        $order = $this->user->orders()->findOneOrFail($id)->first();
    	return view('order.show', [
            'order' => $order
        ]);
    }
}
