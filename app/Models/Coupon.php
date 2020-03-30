<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Gloudemans\Shoppingcart\Facades\Cart;

class Coupon extends Model
{
	protected $table = 'coupons';

    protected $fillable = [
        'code',
        'type',
        'value',
        'percent_off'
    ];

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
     * find coupon by code
     * @param $code 
     */
    public function findByCode($code)
    {
        return $this->model::where('code', $code)->first();
    }

}
