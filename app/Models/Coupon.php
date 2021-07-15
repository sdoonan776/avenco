<?php

namespace App\Models;

use App\Services\CouponStats;
use Illuminate\Database\Eloquent\Model;
use Gloudemans\Shoppingcart\Facades\Cart;

class Coupon extends Model
{
	protected $table = 'coupons';

    protected $fillable = [
        'code',
        'type',
        'percent_off'
    ];

    public function stats()
    {
        return new CouponStats($this);
    }
    
    /**
     * find coupon by code
     * @param $code 
     */
    public function findByCode($code)
    {
        return self::where('code', $code)->first();
    }

    /**
     * Applys discount coupon to cart total
     * @param  $total 
     * @return mixed
     */
    public function applyDiscount($total)
    {
        if ($this->type === 'percent') {
          return round(($this->percent_off / 100) * $total);
        } else {
            return 0;
        }
    }

}
