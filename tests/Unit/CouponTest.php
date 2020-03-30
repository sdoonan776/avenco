<?php

namespace Tests\Unit;

use App\Models\Coupon;
use Illuminate\Foundation\Testing\WithFaker;
use Mockery;
use Tests\TestCase;

class CouponTest extends TestCase
{
    protected $coupon;

    public function setUp(): void
    {
        $this->coupon = Mockery::spy(Coupon::class);
    }

    public function tearDown(): void
    {
        Mockery::close();
    }
    
    public function tests_that_coupon_code_has_been_found(): void
    {
        // $this->assertTrue(method_exists($this->coupon, $this->coupon->findByCode('ABC123')));
    
        // $this->assertTrue(in_array('ABC123', $this->coupon->findByCode('ABC123')));
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
