<?php

namespace App\Interfaces;


interface CouponRepositoryInterface {
	/**
	 * find coupon by code
	 * @param $code 
	 */
	public function findByCode($code);

}