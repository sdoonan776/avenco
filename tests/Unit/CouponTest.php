<?php

namespace Tests\Unit;

use App\Models\Coupon;
use Illuminate\Foundation\Testing\WithFaker;
use Mockery;
use Tests\TestCase;

class CouponTest extends TestCase
{   

    /**
     * 
     * @return [type] [description]
     */
    public function tests_that_coupon_code_has_been_found(): void
    {
        $this->markTestSkipped();
        $this->coupon->findByCode('ABC123');
    }

}
