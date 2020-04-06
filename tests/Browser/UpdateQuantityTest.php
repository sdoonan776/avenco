<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class UpdateQuantity extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function tests_that_cart_quantity_updated_successfully()
    {
        $this->markTestSkipped();
        $this->browse(function (Browser $browser) {
            $browser->loginAs('user@test.com')
                    ->visit('/shop/dress-1')
                    ->press('Add to Cart')
                    ->append('.quantity', 2)
                    ->pause(1000)
                    ->assertSee('Quantity was updated successfully');
        });
    }


}
