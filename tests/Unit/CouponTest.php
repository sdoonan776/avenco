<?php

namespace Tests\Unit;

use App\Models\Coupon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CouponTest extends TestCase
{
    protected Coupon $coupon;

    public function setUp(): void
    {
        parent::setUp();
        $this->coupon = new Coupon();
    }
    
    public function tests_that_coupon_code_has_been_found(): void
    {
        $coupon = $this->coupon->findByCode('ABC123');
        $this->assertContains($coupon, $coupon['code']);
    }

    public function tests_that_coupon_has_been_applied_to_item()
    {
        $this->markTestIncomplete();
    }
}
