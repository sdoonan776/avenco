<?php

namespace App\Services;

use App\Models\Coupon;

class CouponDiscountService 
{
    protected Coupon $model;

    public function __construct(Coupon $model)
    {
        $this->model = $model;
    }
    /**
     * applys discount coupon to cart total
     * @param  [type] $total [description]
     * @return [type]        [description]
     */
    public function discount($total)
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