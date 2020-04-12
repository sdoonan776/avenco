<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AddProductToCartTest extends DuskTestCase
{
    
    public function tests_that_product_is_added_to_shopping_cart()
    {
         $this->browse(function (Browser $browser) {
            $browser->loginAs('user@test.com')
            		->visit('/shop')
            		->visit('/shop/dress-1')
            		->press('Add to Cart')
            		->assertPathIs('/cart')
            		->assertSee('Item was added to your cart!');
        });
    }
}
