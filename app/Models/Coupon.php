<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{

    protected $fillable = [
        'code',
        'type',
        'value',
        'percent_off'
    ];

    public static function findByCode($code)
    {
        return self::where('code', $code)->first();
    }

}
