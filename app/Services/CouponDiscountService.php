<?php

namespace App\Services;

use App\Interfaces\CouponRepositoryInterface;

class CouponDiscountService
{
    protected $couponRepository;

    public function __construct(CouponRepositoryInterface $couponRepository)
    {
        $this->couponRepository = $couponRepository;
    }

    /**
     * Gets discounts totals to be applied to cart item
     * @return mixed
     */
    public function getDiscount()
    {
        Cart::subtotal();
    }

    public function getSubTotal()
    {
        
    }
    
    /**
     * applys discount coupon to cart total
     * @param  $total 
     * @return mixed
     */
    public function applyDiscount($total)
    {
        if ($this->couponRepository->type == 'fixed') {
            return $this->couponRepository->value;
        } elseif ($this->couponRepository->type == 'percent') {
            return round(($this->couponRepository->percent_off / 100) * $total);
        } else {
            return 0;
        }
    }
}