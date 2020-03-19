<?php

namespace App\Services;


class CouponDiscountService 
{
    protected $coupon

    public function __construct(Coupon $coupon)
    {
        $this->coupon = $coupon;
    }
}