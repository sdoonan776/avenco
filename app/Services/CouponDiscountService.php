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
     * Gets discounts totals to be applied to cart item
     * @return mixed
     */
    public function getDiscount()
    {
        return session()->get('coupon')['discount'] ?? 0;
    }

    /**
     * Gets the current tax of the cart 
     * @return mixed
     */
    public function getTax()
    {
        return config('cart.tax') / 100;
    }

    /**
     * Get coupon codes
     * @return mixed
     */
    public function getCode()
    {
        return session()->get('coupon')['name'] ?? null;
    }

    /**
     * Get new subtotal after the discount has been applied
     * @return mixed
     */
    public function getNewSubtotal()
    {
        return (Cart::subtotal() -  $this->getDiscount());
    }

    /**
     * Get new tax after the discount has been applied
     * @return mixed
     */
    public function getNewTax()
    {
        return $this->getNewSubtotal() * $this->getTax();
    }
    
    /**
     * Get new total after the discount has been applied
     * @return [type] [description]
     */
    public function getNewTotal()
    {
        return $this->getNewSubtotal() * (1 + $this->getTax());
    }

    /**
     * Applys discount coupon to cart total
     * @param  $total 
     * @return mixed
     */
    public function applyDiscount($total)
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