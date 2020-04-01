<?php

namespace Tests\Unit;

use App\Models\Coupon;
use Illuminate\Foundation\Testing\WithFaker;
use Mockery;
use Tests\TestCase;

class CouponTest extends TestCase
{   


    public function tests_that_coupon_code_has_been_found(): void
    {
        $this->markTestSkipped();
        $this->coupon->findByCode('ABC123');
    }

    public function tests_that_coupon_has_not_been_found(): void
    {
        $this->markTestIncomplete();
        $coupon = $this->coupon->findByCode();
    }

    public function tests_that_coupon_has_been_applied_to_item(): void
    {
        $this->markTestIncomplete();
    }
}
