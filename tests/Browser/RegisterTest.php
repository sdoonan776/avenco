<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterTest extends DuskTestCase
{

    public function tests_that_a_user_can_successfully_register()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/');
            $browser->clickLink('Register');
            $browser->visit('/register');
            $browser->type('full_name', 'Jared');
            $browser->type('email', 'jared@test.com');
            $browser->type('full_name', 'Jared Fogle');
            $browser->type('username', 'jfogle333');
            $browser->type('password', 'password');
            $browser->type('confirm_password', 'password');
            $browser->press('Register');
            $browser->assertPathIs('/login');
        });
    }
}
