<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CheckoutTest extends DuskTestCase
{
    // use DatabaseMigrations;

    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function tests_that_order_has_been_placed()
    {
        $this->markTestSkipped();
        $data = [
            'name' => 'test',
            'email' => 'test@test.com',
            'address_1' => '123 Fake Street',
            'city' => 'London',
            'country' => 'United Kingdom',
            'postalcode' => 'JI7 2UD',
            'phone' => '0021992839787881',
            'name_on_card' => 'MR T TEST'
        ];

        $this->browse(function (Browser $browser) use ($data) {
            $browser->loginAs('user@test.com')
                    ->visit('/checkout')
                    ->assertSee('Checkout')
                    ->type('name', $data['name'])
                    ->type('email', $data['email'])
                    ->type('address_1', $data['address_1'])
                    ->type('city', $data['city'])
                    ->type('postalcode', $data['postalcode'])
                    ->type('phone', $data['phone'])
                    ->type('name_on_card', $data['name_on_card'])
                    ->press('Place your order')
                    ->assertPathIs('/checkout/order/confirmation');
        });
    }
}
