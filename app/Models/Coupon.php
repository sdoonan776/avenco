<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
     * find coupon by code
     * @param $code 
     */
    public function findByCode($code)
    {
        return $this->model::where('code', $code)->first();
    }

}
