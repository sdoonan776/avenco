<?php

namespace App\Repository;

class CouponRepository extends BaseRepository implements CouponRepository
{

	protected Coupon $model;

	public function __construct(Coupon $model)
	{
		$this->model = $model;
	}

    public static function findByCode($code)
    {
        return $model::where('code', $code)->first();
    }
}
