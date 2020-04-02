<?php

namespace App\Services;

use App\Interfaces\CouponRepositoryInterface;
use App\Models\Coupon;
use Gloudemans\Shoppingcart\Facades\Cart;

class CouponDiscountService
{
    protected $model;

    public function __construct(Coupon $model)
    {
        $this->model = $model;
    }

    /**
     * Applys discount coupon to cart total
     * @param  $total 
     * @return mixed
     */
    public function applyDiscount(int $total)
    {
        if ($this->model->type == 'fixed') {
            return $this->model->value;
        } elseif ($this->model->type == 'percent') {
            return round(($this->model->percent_off / 100) * $total);
        } else {
            return 0;
        }
    }
}