<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Jobs\UpdateCoupon;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{

    protected $coupon;

    public function __construct(Coupon $coupon)
    {
        $this->coupon = $coupon;
    }
    
    /**
     * Obtain the coupon code and update the cart items
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $coupon 
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $coupon = $this->coupon::where('code', $request->coupon_code)->first();

        $coupon = $this->coupon->findByCode($coupon);

        if (!$coupon) {
            return back()->withErrors('Invalid coupon code. Please try again.');
        }

        dispatch_now(new UpdateCoupon($coupon));

        return back()->with('success_message', 'Coupon has been applied!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        session()->forget('coupon');

        return back()->with('success_message', 'Coupon has been removed.');
    }
}
