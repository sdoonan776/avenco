<?php

namespace App\Repository;

use App\Interfaces\CouponRepositoryInterface;
use App\Repository\BaseRepository;

class CouponRepository extends BaseRepository implements CouponRepositoryInterface
{

	protected $model;

	public function __construct(Coupon $model)
	{
		$this->model = $model;
	}

	/**
	 * find coupon by code
	 * @param $code 
	 */
    public static function findByCode($code)
    {
        return $model::where('code', $code)->first();
    }

    /** 
	 * Delete selected coupon by id
	 * @param $id 
	 */
    public function deleteCoupon($id)
    {
    	
    }
}
