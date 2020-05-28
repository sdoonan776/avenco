<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Jobs\UpdateCoupon;
use App\Models\Coupon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CouponController extends Controller
{

    protected Coupon $model;

    public function __construct(Coupon $model)
    {
        $this->model = $model;
    }
    
    /**
     * Obtain the coupon code and update the cart items
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        dd($request);
        $coupon = $this->model::where('code', $request->coupon)->first();

        if (!$coupon) {
            return back()->withErrors('Invalid coupon code. Please try again.');
        }

        dispatch_now(new UpdateCoupon($coupon));

        return back()->with('success_message', 'Coupon has been applied!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(): RedirectResponse
    {
        session()->forget('coupon');

        return back()->with('success_message', 'Coupon has been removed.');
    }
}
