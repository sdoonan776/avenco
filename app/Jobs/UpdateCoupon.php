<?php

namespace App\Jobs;

use App\Models\Coupon;
use App\Services\CouponDiscountService;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UpdateCoupon implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $coupon;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Coupon $coupon)
    {
        $this->coupon = $coupon;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(CouponDiscountService $couponDiscountService)
    {
        if (Cart::currentInstance() === 'default') {
            session()->put('coupon', [
                'name' => $this->coupon->code,
                'discount' => $couponDiscountService->applyDiscount(Cart::subtotal()),
            ]);
        }
    }
}
