<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{

    public function test_that_user_can_login_with_valid_credentials()
    {
        $user = factory(User::class)->create([
            'email' => 'user@test.com',
            'password' => 'password'
        ]);

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/')
                    ->visit('/login')
                    ->type('email', $user->email)
                    ->type('password', $user->password)
                    ->press('login')
                    ->assertPathIs('/');
        });
    }

    public function tests_that_user_cannot_login_with_invalid_credentials()
    {   
        $user = factory(User::class)->create([
            'email' => 'invalid',
            'password' => 'invalid'
        ]);

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/')
                    ->visit('/login')
                    ->type('email', $user->email)
                    ->type('password', $user->password)
                    ->press('login')
                    ->assertPathIs('');
        });
    }
}
