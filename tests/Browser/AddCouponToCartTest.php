<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AddCouponToCartTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
         $this->browse(function (Browser $browser) {
            $browser->loginAs('user@test.com')
            		->visit('/shop/dress-1')
            		->press('Add to Cart')
            		->type('coupon', 'ABC123')
            		->press('Submit')
            		->assertPathIs('/cart')
            		->assertSee('Coupon has been applied!');
        });
    }
}
