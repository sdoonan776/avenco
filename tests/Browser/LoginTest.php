<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    
    public function tests_that_user_can_login_with_valid_credentials(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->visit('/login')
                    ->type('user@test.com', 'email')
                    ->type('password', 'password')
                    ->press('Login')
                    ->seePageIs('/');
        });
    }
}
