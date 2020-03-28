<?php

namespace App\Listeners;

use App\Interfaces\CouponRepositoryInterface;
use App\Jobs\UpdateCoupon;
use App\Models\Coupon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CartUpdatedListener
{
    protected $model;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(CouponRepositoryInterface $model)
    {
        $this->model = $model;
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $couponName = session()->get('coupon');

        if ($couponName) {
            $coupon = $this->model::where('code', $couponName)->first();

            dispatch_now(new UpdateCoupon($coupon));
        }
    }
}
