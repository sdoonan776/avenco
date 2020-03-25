<?php

namespace Tests\Unit;

use App\Interfaces\CouponRespositoryInterface;
use Illuminate\Foundation\Testing\WithFaker;
use Mockery;
use Tests\TestCase;

class CouponTest extends TestCase
{
    protected $coupon;

    public function setUp(): void
    {
        $this->coupon = Mockery::mock(CouponRespositoryInterface::class);
    }

    public function tearDown(): void
    {
        Mockery::close();
    }
    
    public function tests_that_coupon_code_has_been_found(): void
    {
        $this->assertTrue(method_exists($this->coupon));
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
