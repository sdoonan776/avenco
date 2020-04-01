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
        $this->markTestIncomplete();
        $this->browse(function (Browser $browser) {
            $browser->loginAs('user@test.com')
                    ->visit('/shop/omnis-accusamus')
                    ->visit('/cart');
        });
    }


}
