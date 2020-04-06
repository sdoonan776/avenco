<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AddProductToCartTest extends DuskTestCase
{
    /**
     * @return void
     */
    public function tests_that_product_is_added_to_cart()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs('user@test.com')
                    ->visit('/shop')
                    ->visit('/shop/dress-1')
                    ->assertSee('Dress 1')
                    ->press('addToCart')
                    ->assertPathIs('/cart');
        });
    }
}
