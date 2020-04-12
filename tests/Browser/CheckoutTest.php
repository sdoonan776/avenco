<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CheckoutTest extends DuskTestCase
{
    
    public function tests_that_checkout_flow_is_completed_and_order_placed()
    {
         $this->browse(function (Browser $browser) {
            $browser->visit('/cart')
            		->clickLink('Proceed to checkout')
            		->visit('/checkout')
            		->type('name', 'Jane Doe')
            		->type('address_1', '123 Fake Street')
            		->type('address_2', 'Fallbrook')
            		->type('city', 'Arndale')
            		->select('GB', 'country')
            		->type('postalcode', 'BT73 6YT')
            		->type('phone', '0121231232462776623')
            		->type('name_on_card', 'MS J DOE')
            		->press('Place your order')
            		->assertPathIs('/checkout/order/confirmation');
        });
    }
}
